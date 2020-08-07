<?php
function jsEnqueuer_add_style_and_script_WP(){
    global $wp_query,$wpdb;
    $postID=$wp_query->post->ID;
    wp_enqueue_style( 'jsEnqueuer-bootstrap-css', "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" );
    wp_enqueue_style( 'jsEnqueuer-fontawesome-css', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" );
    wp_enqueue_style( 'jsEnqueuer-chart-css', "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" );

    wp_enqueue_script( 'chart-js', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js', array(), true );
  
    wp_localize_script( 'wp-classic-js-enqueuer', 'frontend_wp', array( 'ajax_url' => admin_url('admin-ajax.php'),'postID'=>$postID,'postURL'=>get_permalink( $wp_query->post->ID )) );
  
    $sql = "SELECT * FROM wp_js_enqueuer WHERE PostID='$postID'"; 
    $result=$wpdb->get_results($sql);
    echo json_encode($result);
    foreach($result as $row){
        wp_enqueue_script(
            'wp-classic-js-'.$row->jsFile,
            plugins_url( '/JS/'.$row->jsFile, __FILE__ ),
            array('jquery','wp-data'),
            date("h:i:s")
            );
    }
 
}
add_action( 'wp_enqueue_scripts', 'jsEnqueuer_add_style_and_script_WP' );
