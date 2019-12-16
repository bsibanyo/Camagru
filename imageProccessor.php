<?php
  // session_start();
//   require_once 'imageInsert.php';
//   require_once 'controls.php';
require_once 'config/database.php';
require_once 'signup.inc.php';




  if (isset($_POST['upload'])){
        //$filename      = time()."_".uniqid();
        $filename      = uniqid();
        $target_file   = $filename;
      	// $target_file2   = "./saveImages/".$filename;
        $file          = $_FILES["file"];
      	$imageFileType = strtolower(pathinfo($file["tmp_name"], PATHINFO_EXTENSION));
      	$allowed       = array('jpg', 'jpeg', 'gif', 'png', 'tif');
      	$target_file  .= '.'.explode('/', $file['type'])[1];
      	$filename	  .= '.'.explode('/', $file['type'])[1];

        // $get = file_get_contents("./saveImages/".$target_file);
        $new = explode('1./',$target_file);
        $newer = "./ImageSaved/".$new[0]; // change to $target_file




      	// file_put_contents($newer, file_get_contents("Camagru/saveImages/".$target_file, true));
      	// file_put_contents($newer, file_get_contents($file['tmp_name']));
        move_uploaded_file($file['tmp_name'], $newer);
        // $get = file_get_contents($target_file);
        //$new = explode('1./',$target_file);
        //$newer = "./saveImages/".$new[0];

        insertImage($_SESSION['id'],$_SESSION['username'], $newer);

        echo $_SESSION['id'] . "\n" . $_SESSION['username'];
         
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
