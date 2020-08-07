<?php
function storingFile(){
    $uploadedfile = $_FILES['file'];
    $fileName=$_POST['name'];
    $upload_overrides = array('test_form' => false);
    $movefile = wp_handle_upload($uploadedfile, $upload_overrides);
    rename($movefile['file'],plugin_dir_path(__FILE__).'\frontend\JS/'.$fileName);
    move_uploaded_file ($movefile['file'],plugin_dir_path(__FILE__));
    
    if ($movefile && !isset($movefile['error'])) {
       echo "File Uploaded successfully";
  } else {
      echo $movefile['error'];
  }
  die();
}

add_action( 'wp_ajax_storingFile', 'storingFile');
