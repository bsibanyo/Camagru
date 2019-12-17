<?php

require_once 'config/database.php';
require 'signup.inc.php';




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
