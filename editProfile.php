<?php

require_once 'config/database.php';
require 'signup.inc.php';

 $msg = "";
function update($fromValue, $toValue, $id){
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

function getPassword($id){
    global $conn;
    try{
        $query = "SELECT * FROM users WHERE id='$id' LIMIT 1 ";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        echo "Unable to access db".$e->getMessage();
    }
    return $result['password'];
}

if(isset($_POST['Update']) && isset($_POST['Username'])){
    if(!empty($_POST['Username'])){
        $username =  cleanInput($_POST['Username']);
        update('username', $username, $_SESSION['id']);
    }
}
if(isset($_POST['Update']) && isset($_POST['Email'])){
    if(!empty($_POST['Email'])){
        $email =  cleanInput($_POST['Email']);
        update('email', $email, $_SESSION['id']);
    }
}
if(isset($_POST['Update']) && isset($_POST['Oldpassword'])){
    $Oldpassword =  cleanInput($_POST['Oldpassword']);
    if(password_verify($Oldpassword, getPassword($_SESSION['id']))){
        if(empty($_POST['Newpassword']) || empty($_POST['passwordConfirm'])){
            $msg = "Empty Fields!";
        }
        else{
            $newPassword = cleanInput($_POST['Newpassword']);
            $passwordConfirm = cleanInput($_POST['passwordConfirm']);
            if( $newPassword != $passwordConfirm){
                $msg = "Passwords don't match!";
            }
            else{
                $hashed = password_hash($newPassword, PASSWORD_BCRYPT);
                update('password', $hashed, $_SESSION['id']);
            }
        }
    }
    else{
        $msg = "All passwords do not match!";
    }
   
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
               <input type="password" placeholder="New Password"   name="Newpassword">  </br>
               <input type="password" placeholder="Confirm  New Password"   name="passwordConfirm"> </br>
                Nofication: 
               YES<input type="radio" name="notification" value="yes">
               NO<input type="radio" name="notification" value="no"></br>


               <button class="form-btn" type="submit" name="Update">Update Info</button>

               
             
             
           </form>  

</body>
</html>