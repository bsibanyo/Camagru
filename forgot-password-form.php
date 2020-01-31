<?php
session_start();
require_once 'config/database.php';

function cleanInput($accept){
    $var = htmlspecialchars(strip_tags(trim($accept)));
    return $var;
}

$msg = "";

if (isset($_GET['email'])) {
    $_SESSION['userEmail'] = $_GET['email'];
}

if (isset($_POST['submit'], $_SESSION['userEmail']))
{
    $email = cleanInput($_SESSION['userEmail']);
    $password = cleanInput($_POST['newPassword']);
    echo "password: ". $password;
    if (empty($password)) {
        $msg = "The password is empty";
    }
    $verifypassword = cleanInput($_POST['verifyPassword']);
    echo "ver password: ". $verifypassword;

    try{
        $query = "UPDATE users SET password = ? WHERE email = ?";
        $newpassword = password_hash($password, PASSWORD_BCRYPT);    
        $stmt = $conn->prepare($query);    
        $stmt->execute([$newpassword, $email]);
    }
    catch(PDOException $e)
    {
        echo "Unable to update in the database " . $e->getMessage();
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, innitial-scale=1.0, minimum-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div id="wrapper">
    <div class="container">
        <div class="#"></div>
        <div class="form-data">
           <form action="forgot-password-form.php" method="POST">
               <div class="logo">
                   <img src="images/logo.png" alt="camagru">
               </div>
               <div class="error">
               <?php echo $msg; ?>
               </div>
               <input type="password" placeholder="New Password" name="newPassword">
               <input type="password" placeholder="Verify Password" name="verifyPassword">
               <button class="form-btn" type="submit" name="submit">Reset My Password</button>
               
           </form>   
           <div class="sign-up">
               Don't have an account?<a href="index.php">Sign up</a>
           </div>
           <div class="get-the-app">
               <span>Get the app.</span>
               <div class="badges">
                   <img src="images/appStore.png" alt="App Store">
                   <img src="images/googlePlay.png" alt="Google Store">
               </div>
           </div>
        </div>
    </div>
   

    <footer>
        <div class="container">
            <nav class="footer-nav">
                <ul>
                    <li>
                        <a href="#">About us</a>
                    </li>
                    <li>
                        <a href="#">Support</a>
                    </li>
                    <li>
                        <a href="#">Press</a>
                    </li>
                    <li>
                        <a href="#">Api</a>
                    </li>
                    <li>
                        <a href="#">Jobs</a>
                    </li>
                    <li>
                        <a href="#">Privacy</a>
                    </li>
                    <li>
                        <a href="#">Terms</a>
                    </li>
                    <li>
                        <a href="#">Directory</a>
                    </li>
                    <li>
                        <a href="#">Profiles</a>
                    </li>
                    <li>
                        <a href="#">Hashtags</a>
                    </li>
                    <li>
                        <a href="#">Languages</a>
                    </li>

                </ul>
            </nav>
            <div class="copyright-notice">
                &copy; 2019 Camagru
            </div>
        </div>
    </footer>
</div>

</body>
</html>