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
    <title>Profile</title>
</head>
<body>
   <?php require_once 'header.php';?>
   <?php require 'signup.inc.php';?>

   
<div class="card">
  <img src="images/profile.jpg" alt="" style="width:100%">
 
   
  
  <p><button>Upload</button></p>
</div>
<hr>

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
      //echo '<form action="gallery.php" method="post">
      //<input type="hidden" name="img_id" value="'.$row['id'].'">
      //<input type="submit" class="post" name="edit-btn" value="Edit "  >
      
  //    </form>';
   
      echo '</div>';
      echo '<a href="edit.php"><button class="btn btn-primary" style="width: 15%; margin-left: 4px; ">Edit</button></a><br>';
      echo '<a href="delete.php?id='.$dest.'&rm=1"><button class="btn btn-danger" style="width: 15%; margin-left: 4px; ">Delete</button></a><br>';
      ?>
      <?php
      
        $i++;
      }
     
      
    }
    getImage();
    
    
    ?>
 
</body>
<?php require 'footer.php'?>
</html>