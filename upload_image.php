
<?php
$target_dir = "./upload/image";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$image_file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_FILES["image"])) {
    if(getimagesize($_FILES["image"]["tmp_name"]) == false){
        echo "File is not an image.";
        
    }else if(file_exists($target_file)){
          echo "File already exists.";
    
        
    }else if($_FILES["image"]["size"] > 2000000){
      echo "Your file is too large, max : 2MB";
    
        
    }else if($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg"
    && $image_file_type != "gif" ) {
      echo "Only JPG, JPEG, PNG & GIF files are allowed.";
    
        
    }else {
        $time=time();
        $rand=rand(1,10);
        $tmp=$_FILES["image"]["tmp_name"];
        $extension = explode("/", $_FILES["image"]["type"]);
        $new_image_name='image_'.$rand.$time.".".$extension[1];
        $upload_flag=move_uploaded_file($tmp, $target_dir .$new_image_name);
      if ($upload_flag) {
        echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
      } else {
        echo "There was an error uploading your file.";
      }
    }
    
}
?>
