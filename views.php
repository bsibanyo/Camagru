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

            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $dest = $row['id'];
              
              
              $viewComments = $row['comment'];
              $commenter = $row['username'];
           
                echo "<p>$commenter: $viewComments</p><hr>";    
                
           
             
            }


        }
        getComments();


    ?>
    
</body>
</html>
