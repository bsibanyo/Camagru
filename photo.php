<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/photo.css">
    <link rel="stylesheet" href="css/profile.css">
    <script src="photo.js"></script>
    <title>Photo</title>
</head>
<body>
<nav>
        <ul>
            <li>Camagru</li>
            <li>User</li>
            <li>Edit</li>
            <li>Gallery</li>
            <li>Notification</li>
            <li>Members</li>
            <li>Logout</li>
        </ul>
    </nav>
    <div class="booth">
        <video id="video" width="400" height="300"></video>
        <a href="#" id="capture" class="booth-capture-button">Take photo</a>
        <canvas id="canvas" width="400" height="300"></canvas>
        <img id="photo" src="images/screenshot!.jpg" width="400" height="300" alt="">
    </div>

   <?php require 'footer.php'?>
</body>
</html>