<?php
require_once 'login.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, innitial-scale=1.0, minimum-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="wrapper">
    <div class="container">
        <div class="#"></div>
        <div class="form-data">
           <form action="login.php" method="post">
               <div class="logo">
                   <img src="images/logo.png" alt="camagru">
               </div>
               <div class="error">
               <?php echo $msg; ?>
               </div>
               <input type="text" placeholder="Username" name="username">
               <input type="password" placeholder="Password" name="password">
               <button class="form-btn" type="submit" name="submit">Log in</button>
               <span class="has-seperator">Or</span>
               <a class="facebook-login" href="#">
                   <i class="fab fa-facebook"></i>Log in with Facebook
               </a>
               <a class="password-reset" href="forgotPassword.php" >Forgot password?</a>
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