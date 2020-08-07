<?php
// For deactivating Gutenberg Editor
add_filter('use_block_editor_for_post','__return_false',10);

function jsEnqueuer_plugin_to_Admin_Panel(){
    add_menu_page(
        'JS Enqueuer', // Title of the page
        'JS Enqueuer', // Text to show on the menu link
        'manage_options', // Capability requirement to see the link
        'jsEnqueuer/assets/jsEnqueuer_plugin_page.html' // The 'slug' - file to display when clicking the link
    );

}

add_action( 'admin_menu', 'jsEnqueuer_plugin_to_Admin_Panel' );


// Importing Files
require_once plugin_dir_path(__FILE__) . '/assets/jsEnqueuer_assets_config.php';
require_once plugin_dir_path(__FILE__) . '/jsEnqueuer_databases.php';
