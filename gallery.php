<?php require 'signup.inc.php';
 
 //likes
 if(isset($_GET['id'])){
   $img_id = $_GET['id'];
   $clicked = $_GET['clicked'];
   
  }
 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/profileEditor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
  
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $dest = $row['id'];
    $user_id = $row['user_id'];
    
    $temp = explode("_", $row['img']);
  
      $link = '<a  href="comments_likes.php?id='.$dest.'&userId='.$user_id.'">';
      
      echo $link.'<img class="grid-item" src="' . $row['img'] . '" height="250" width="250" alt="fail"></a><br>';
     
      echo '<a href="gallery.php?id='.$row['id'].'&clicked=1"><i class="fa fa-thumbs-up"></i></a>';
      echo '<a href="#"><i class="fa fa-comments-o"></i></a>';
      
      echo "<button class='btn btn-primary' style='width: 15%; margin-left: 4px;'>Views</button><br>";
      
        
      }
     
      
    }
    getImage();
    
    
    ?>

</body>    
</html>
