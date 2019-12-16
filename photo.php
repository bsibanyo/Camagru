<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/photo.css">
    <link rel="stylesheet" href="css/profile.css">
    <title>Photo</title>
</head>
<body>
<nav>
        <ul>
            <li>Camagru</li>
            <li>User</li>
            <li><a href="profile.php">Profile</a></li>
            <li>Gallery</li>
            <li>Notification</li>
            <li>Members</li>
            <form action="logout.php" method="post">
                    <button type="submit" name="logout" class="logout">Logout</button>
                </form>
        </ul>
    </nav>
    <div class="booth">
    
        <video id="video" width="400" height="300"></video>
        <a href="#" id="capture" class="booth-capture-button" name="capture">Take photo</a>

        <input type="submit" id="take" name="snap-btn" value="Capture">
        <!--<form class="" action="ft_snapchat.php" method="post"  onsubmit="upload_img();">--><!--- this is to be commented out -->
          <!--<input type="hidden"  id="img_sub" name="images" value="">--><!--- this is to be commented out -->
          <input type="button" id="upload" name="upload" value="Upload">


        <!-- <canvas id="canvas" width="400" height="300"></canvas> -->
        
        <canvas id="canvas" name="images" hidden></canvas>

        <!-- <img id="photo" src="images/screenshot!.jpg" width="400" height="300" alt=""> -->
        <img id="output" src="" name="images" style="display:inline-block; vertical-align: top;" alt="">
    </div>
    <script src="photo.js"></script>
   <?php require 'footer.php'?>
</body>
</html>