<?php
ini_set( 'upload_max_size' , '50M' );
ini_set( 'post_max_size', '50M'); 
ini_set( 'upload_max_filesize', '50M'); 
ini_set( 'max_execution_time', '1800'); 
ini_set( 'max_input_time', '-1'); 
ini_set( 'memory_limit', '256M'); 
// phpinfo();
/* Getting file name */
$filename = time().$_FILES['file']['name'];
  
/* Location */
$location = "../uploads_file/".$filename;
$uploadOk = 1;
  
if($uploadOk == 0){
   echo 0;
}else{
   /* Upload file */
   if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
      echo "http://gosport.world/uploads_file/".$filename;
   }else{
      echo 0;

   }
}
?>