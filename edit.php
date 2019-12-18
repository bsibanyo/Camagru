<?php
    require 'signup.inc.php';
    require_once 'config/database.php';

    function imageMerge($image3, $image2, $imageId){
        global $conn;

        list($width, $height) = getimagesize($image2);

        $image3 = imagecreatefromstring(file_get_contents($image3));
        $image2 = imagecreatefromstring(file_get_contents($image2));
    
        imagecopymerge($image3, $image2, 450, 0, 0, 0, $width, $height, 100);
        
        $check_img = getStickerImage("images", $imageId);
        if (preg_match('/imageSaved/', $check_img)) {
          $newImage = explode("imageSaved/", $check_img);
          $img =  "3".$newImage[1];
          ini_set('memory_limit', '-1');
          imagepng($image3, $img);
        }else {
          $img = "3".$image3;
          ini_set('memory_limit', '256M');
          imagepng($image3, "3".$image3);
        }
    
   
            $query = "UPDATE images SET img='$img' WHERE id='$imageId'";
       $stmt = $conn->prepare($query);
     
          $stmt->execute();
          header('location: profile.php');
    }

    function getStickerImage($table_name, $imageId)
  {
    global $conn;

    try {
        $sql = "SELECT * FROM $table_name WHERE id='$imageId'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $img = $row['img'];
    } catch (PDOException $e) {
      echo "Failed to pull image from the database ".$e->getMessage();
    }
    return $img;
  }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $image1 = $_GET['stick'];
        // echo "$id "; 
        // echo "$image1";
        $getImage = getStickerImage("images", $id);
        imageMerge($getImage, $image1, $id);
    }
?>
