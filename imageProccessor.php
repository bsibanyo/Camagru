<?php

require_once 'config/database.php';
require 'signup.inc.php';


$errorn = array();
if(isset($_POST['Upload'])){
  print_r($_FILES);

  $fileinfo = @getimagesize($_FILES["uploadProfile"]["tmp_name"]);
      $filename = time()."_".$_FILES["uploadProfile"]["name"];
      $allowed_image_extension = array("png", "jpg", "jpeg");

      $file_extension = pathinfo($_FILES["uploadProfile"]["name"], PATHINFO_EXTENSION);
      if (! file_exists($_FILES["uploadProfile"]["tmp_name"])) {
        $errorn["imageError"] = "Choose image file to upload.";
      }else if (! in_array($file_extension, $allowed_image_extension)) {
        $errorn["imageError"] = "Upload valid images. Only PNG and JPEG are allowed.";
      }else {
        
        $img_dir = $_FILES["uploadProfile"]["name"];
        if (move_uploaded_file($_FILES["uploadProfile"]["tmp_name"], $img_dir)) {
          $response["imageSuccess"] = "Image uploaded successfully.<br>";
        }else {
            $errorn["imageError"] = "Problem in uploading image files.";
        }
      }

      if (count($errorn) === 0) {
        
        insertImage($_SESSION['id'],$_SESSION['username'], $_FILES["uploadProfile"]["name"]);
      };
   
}





  if (isset($_POST['upload'])){
   
        $filename      = uniqid();
        $target_file   = $filename;
        $file          = $_FILES["file"];
        $imageFileType = strtolower(pathinfo($file["tmp_name"], PATHINFO_EXTENSION));
        $allowed       = array('jpg', 'jpeg', 'gif', 'png', 'tif');
        $target_file  .= '.'.explode('/', $file['type'])[1];
        $filename	  .= '.'.explode('/', $file['type'])[1];
        $new = explode('1./',$target_file);
        $newer = "./imageSaved/".$new[0]; // change to $target_file


        file_put_contents($newer, file_get_contents($file['tmp_name']));
        // echo "\n\n$newer\n\n".$file['tmp_name'];

        move_uploaded_file($file['tmp_name'], $newer);

        insertImage($_SESSION['id'],$_SESSION['username'], $newer);
         
      }

      function insertImage($id, $username,$imgname)
      {
        global $conn;
        try {
          $sql = "INSERT INTO images(img, username,user_id) VALUES (:img, :username,:user_id)";
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':img', $imgname);
          $stmt->bindParam(':username', $username);
          $stmt->bindParam(':user_id', $id);
          $stmt->execute();
        } catch (PDOException $e) {
          echo "Image failed to upload --->>>>".$e->getMessage();
        }
      }


 ?>
