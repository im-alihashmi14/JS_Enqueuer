<?php

function storingFile(){
    global $wpdb;
    $uploadedfile = $_FILES['file'];
    $fileName=$_POST['name'];
    $postID= $_POST['PostID'];
    $postURL=$_POST['PostURL'];
    $upload_overrides = array('test_form' => false);
    $movefile =wp_upload_bits($_FILES['file']['name'], null,file_get_contents($_FILES["file"]["tmp_name"]));
    
    // $movefile = wp_handle_upload($uploadedfile, $upload_overrides);
    rename($movefile['file'],plugin_dir_path(__FILE__).'\frontend\JS/'.$fileName);
    
    $dataArray=array(
        'jsFile'=>$fileName,
        'PostID'=>$postID,
        'PostURL'=>$postURL
      );

    $wpdb->insert (
        'wp_js_enqueuer',
       $dataArray
        );

        echo json_encode($movefile);
    if ($movefile && !isset($movefile['error'])) {
       echo "File Uploaded successfully";
  } else {
      echo $movefile['error'];
  }
  die();
}

add_action( 'wp_ajax_storingFile', 'storingFile');
