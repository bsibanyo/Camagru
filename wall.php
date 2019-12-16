<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wall</title>
</head>
<body>
<div class="wall">
    <nav>
        <button type="submit"><a href="index.php">Back</a></button>
    </nav>
</div>

<div id="wrapper">
    <div class="container">
        
               
               <div class="logo">
                   <img src="images/screenshot!" alt="camagru">
               </div>
               <div class="logo">
                   <img src="images/screenshot1" alt="camagru">
               </div>
              
              
    </div>

    <?php

        require_once 'config/database.php';
        function getImage(){
            global $conn;
            $query = "SELECT * FROM images";
            $stmt = $conn->prepare($query);
            $stmt->execute();

            echo '<div class="gallery" style=" display : grid; grid-template-columns : 1fr 1fr 1fr; grid-gap: 1rem; width: 100vw; margin :3rem 3rem; ">';//grid-template-rows: auto; //repeat(auto-fit, minmax(300px, 1fr))
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              // echo '<div class="grid-item">';
              $dest = $row['id'];
              $user_id = $row['user_id'];
              // echo "<td>";
              $temp = explode("_", $row['img']);
              if (isset($_SESSION['id'])) {
                $link = '<a  href="comments_likes.php?id='.$dest.'&userId='.$user_id.'">';
    
                echo $link.'<img class="grid-item" src="' . $row['img'] . '" height="250" width="250" alt="fail"></a>';
              }else{
              echo '<img class="grid-item" src="'.$row['img'] . '" height="250" width="250" alt="fail">';
              }
              // echo "<br>";
              // echo "</td><br>";
              // echo "</div>";
            }
            echo "</div>";

        }


    ?>
    
</body>
</html>
