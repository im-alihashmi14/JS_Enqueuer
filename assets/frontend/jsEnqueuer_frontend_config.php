<?php
function jsEnqueuer_add_style_and_script_WP(){
    global $wp_query;
    wp_enqueue_style( 'jsEnqueuer-bootstrap-css', "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" );
    wp_enqueue_style( 'jsEnqueuer-fontawesome-css', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" );
    wp_enqueue_style( 'jsEnqueuer-chart-css', "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" );

    wp_enqueue_script( 'chart-js', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js', array(), true );
    wp_enqueue_script(
        'wp-classic-js',
        plugins_url( '../../JS/frontend_component_wp.js', __FILE__ ),
        array('jquery','wp-data'),
        date("h:i:s")
        );
    wp_localize_script( 'wp-classic-js', 'frontend_wp', array( 'ajax_url' => admin_url('admin-ajax.php'),'postID'=>$wp_query->post->ID,'postURL'=>get_permalink( $wp_query->post->ID )) );
    wp_enqueue_script( 'socketIO-js', 'https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js', array(), true );

}
add_action( 'wp_enqueue_scripts', 'jsEnqueuer_add_style_and_script_WP' );
