<?php

require_once 'config/database.php';
require_once 'signup.inc.php';


function update($fromValue, $toVaue, $id){
    global $conn;
    try{

        $query = "UPDATE users SET $fromValue='$toValue' WHERE id='$id'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
    }
        catch(PDOException $e){
            echo "Error :".$e->getMessage();
    }
}

function cleanInput($accept){
    $var = htmlspecialchars(strip_tags(trim($accept)));
    return $var;
}

if(isset($_POST['Update']) && isset($_POST['Username'])){
    $username =  cleanInput($_POST['Username']);
    update('username', $username, $_SESSION['id']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Profile editor</title>
</head>
<body>
<form action="editProfile.php" method="post">
               
               <div class="logo">
                   <img src="images/logo.png" alt="camagru">
               </div>
               <div class="error">
               <?php echo $msg; ?>
               </div>
               <input type="text" placeholder="Username"   name="Username"> </br>
               <input type="email" placeholder="Email"  name="Email">  </br>
               <input type="password" placeholder="Old Password"   name="Oldpassword">  </br>
               <input type="password" placeholder="New Password"   name="PasswordRepeat">  </br>
               <input type="password" placeholder="Confirm  New Password"   name="passwordConfirm"> </br>
                Nofication: 
               YES<input type="radio" name="notification" value="yes">
               NO<input type="radio" name="notification" value="no"></br>


               <button class="form-btn" type="submit" name="Update">Update Info</button>

               
             
             
           </form>  

</body>
</html>