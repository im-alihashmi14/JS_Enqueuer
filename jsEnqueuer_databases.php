<?php

// function thingsFly_table(){
  global $wpdb;
  $table_name = $wpdb->prefix . 'js_enqueuer';
  $charset_collate = $wpdb->get_charset_collate();
  $sql = "CREATE TABLE IF NOT EXISTS $table_name(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    jsFile VARCHAR(50),
    PostID VARCHAR(50),
    PostURL VARCHAR(100),
    ) $charset_collate;";

  require_once ABSPATH . 'wp-admin/includes/upgrade.php';   
  dbDelta( $sql );
