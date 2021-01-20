<?php require 'signup.inc.php';
require 'config/database.php';

function cleanInput($accept){
  $var = htmlspecialchars(strip_tags(trim($accept)));
  return $var;
}
 
  function addLikes($id, $username, $likes){
    global $conn;
    try{
      $query = "INSERT INTO likes (img_id,username,likes) VALUES (:img_id, :username, :likes)";
      $stmt = $conn->prepare($query);
      $stmt->bindParam(':img_id', $id);
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':likes', $likes);
      $stmt->execute();
    }
    catch(PDOException $e){
      echo "Uanble to access database >".$e->getMessage();
    }
  }

  function addComment($id, $username, $comment){
    global $conn;
    try{
      $query = "INSERT INTO comments (comment, img_id,username) VALUES (:comment,:img_id, :username)";
      $stmt = $conn->prepare($query);
      $stmt->bindParam(':comment', $comment);
      $stmt->bindParam(':img_id', $id);
      $stmt->bindParam(':username', $username);
      
      $stmt->execute();
    }
    catch(PDOException $e){
      echo "Uanble to access database >".$e->getMessage();
    }
  }

 //likes
 if(isset($_GET['id'])){
   $img_id = $_GET['id'];
   $clicked = $_GET['clicked'];
   addLikes($img_id, $_SESSION['username'], $clicked);
  }

  if(isset($_POST['comment-btn'])){
    $coment = cleanInput($_POST['comment']);
    $id = cleanInput($_POST['img_id']);
    addComment($id, $_SESSION['username'], $coment);
  }
 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/profile.css">
    <!-- <link rel="stylesheet" href="css/styles.css"> -->
    <!-- <link rel="stylesheet" href="css/profileEditor.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <title>Profile</title>
  </head>
  <body>
    <?php require_once 'header.php';?>
    
    
    <?php


require_once 'config/database.php';
function getImage(){
  global $conn;
  $query = "SELECT * FROM images";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $i = 0;
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $dest = $row['id'];
    $user_id = $row['user_id'];
    
    $temp = explode("_", $row['img']);
      echo '<div>';
      $link = '<a  href="comments_likes.php?id='.$dest.'&userId='.$user_id.'">';
      
      echo $link.'<img class="grid-item" src="' . $row['img'] . '" height="250" width="250" alt="fail"></a><br>';
      echo '<form action="gallery.php" method="post">
      <input type="text" name="comment">
      <input type="hidden" name="img_id" value="'.$row['id'].'">
      <input type="submit" class="post" name="comment-btn" value="Comment">
      <a href="gallery.php?id='.$row['id'].'&clicked=1"><i class="fa fa-thumbs-up"></i></a>
      </form>';
   
      echo '</div>';
      ?>
      <?php
      echo "<a href='views.php'><button class='btn btn-primary' style='width: 15%; margin-top: 70px;'>Views</button></a><br>";
      
        $i++;
      }
     
      
    }
    getImage();
    
    
    ?>

    <?php require 'footer.php'?>

</body>    
</html>
