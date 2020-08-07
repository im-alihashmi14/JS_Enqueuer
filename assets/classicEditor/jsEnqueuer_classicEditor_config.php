<?php

//Rendering button on post side

function jsEnqueuer_button(){
    echo '<br><button type="button" id="jsEnqueuer_btn" class="btn btn-outline-info btn-lg">JS Enqueuer</button><br>';
}

add_action( 'edit_form_after_title', 'jsEnqueuer_button' );


//Enqueue Scripts into Admin 

function jsEnqueuer_add_style_and_script() {
    //enqueuing bootstrap libraries
    global $wp_query;
    wp_enqueue_style( 'jsEnqueuer-bootstrap-css', "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" );
    wp_enqueue_style( 'jsEnqueuer-fontawesome-css', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" );

    wp_enqueue_style( 'jsEnqueuer-chart-css', "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" );
    
    if(!get_current_screen()->is_block_editor()){
    //enqueuing javascript
    wp_enqueue_script( 'chart-js', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js', array(), true );
    wp_enqueue_script( 'jsEnqueuer-bootstrap-js',
     "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js",
      array('jquery'),
       '1.0.0',
        true );
    wp_enqueue_script( 'socketIO-js', 'https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js', array(), true );
    
    wp_enqueue_script(
        'admin-classic-js',
        plugins_url( '/JS/classic_editor_component_admins.js', __FILE__ ),
        array('jquery','wp-data'),
        date("h:i:s")
        );
    wp_localize_script( 'admin-classic-js', 'classic_ajax', array( 'ajax_url' => admin_url('admin-ajax.php'),'postURL'=>get_permalink( $wp_query->post->ID )) );
    
}
    
}
add_action( 'admin_enqueue_scripts', 'jsEnqueuer_add_style_and_script' );




require_once plugin_dir_path(__FILE__) . '/jsEnqueuer_modal.php';

