
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/profileEditor.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <title>Profile</title>
</head>
<body>
   <?php require_once 'header.php';?>
   <?php require 'signup.inc.php';?>

   
<!-- <div class="card">
  <img src="images/profile.jpg" alt="" style="width:100%">
  <h1><?php  $_SESSION['username']?></h1>
  
  
  <a href="#"><i class="fa fa-thumbs-up"></i></a><br>
  <a href="#"><i class="fa fa-thumbs-down"></i></a>
</div> -->





    
</body>
</html>


<?php

require_once 'config/database.php';
function getImage(){
    global $conn;
    $query = "SELECT * FROM images";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    // echo '<div class="gallery" style=" display : grid; grid-template-columns : 1fr 1fr 1fr; grid-gap: 1rem; width: 100vw; margin :3rem 3rem; ">';//grid-template-rows: auto; //repeat(auto-fit, minmax(300px, 1fr))
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $dest = $row['id'];
      $user_id = $row['user_id'];
      
      $temp = explode("_", $row['img']);
    //   if (isset($_SESSION['id'])) {
        $link = '<a  href="comments_likes.php?id='.$dest.'&userId='.$user_id.'">';

        echo $link.'<img class="grid-item" src="' . $row['img'] . '" height="250" width="250" alt="fail"></a><br>';
        echo "<button style='width: 5%;'>like</button>";
        echo "<button style='width: 15%;'>Add Comments</button>";
        echo "<button style='width: 15%;'>View Comments</button><br>";
    //   }else{
    //   echo '<img class="grid-item" src="'.$row['img'] . '" height="250" width="250" alt="fail">';
    //   }
     
    }
    // echo "</div>";

}
getImage();


?>

