<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Views</title>
</head>
<body>
<div class="wall">
    <nav>
        <button type="submit"><a href="gallery.php">Back</a></button>
    </nav>
</div>


    <?php

        require_once 'config/database.php';
        require 'signup.inc.php';
        $viewComments = "";
        function getComments(){
            global $conn;
            $query = "SELECT * FROM comments";
            $stmt = $conn->prepare($query);
            $stmt->execute();

            // echo '<div class="gallery" style=" display : grid; grid-template-columns : 1fr 1fr 1fr; grid-gap: 1rem; width: 100vw; margin :3rem 3rem; ">';//grid-template-rows: auto; //repeat(auto-fit, minmax(300px, 1fr))
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $dest = $row['id'];
              
              
              $viewComments = $row['comment'];
              $commenter = $row['username'];
            //   if (isset($_SESSION['id'])) {
                echo "<p>$commenter: $viewComments</p><hr>";    
                
            //   }else{
            //   echo '<img class="grid-item" src="'.$row['img'] . '" height="250" width="250" alt="fail">';
            //   }
             
            }
            // echo "</div>";

        }
        getComments();


    ?>
    
</body>
</html>
