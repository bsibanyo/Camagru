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
  <h1><?php

  $user_id = $_SESSION['username'];
  $username = $_SESSION['username'];
  ?></h1>
  
  
  <a href="#"><i class="fa fa-thumbs-up"></i></a><br>
  <a href="#"><i class="fa fa-thumbs-down"></i></a>
  <!-- <a href="#"><i class="fa fa-linkedin"></i></a>
  <a href="#"><i class="fa fa-facebook"></i></a> -->
  <p><button>Upload</button></p>
</div>





    
</body>
</html>