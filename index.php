<?php
require_once 'signup.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, innitial-scale=1.0, minimum-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="wrapper">
    <div class="container">
        <div class="phone-app-demo"></div>
        <div class="form-data">
           <form action="index.php" method="post">
               
               <div class="logo">
                   <img src="images/logo.png" alt="camagru">
               </div>
               <?php
                echo "<ul>";
                if(count($error) > 0) {
                    foreach ($error as $me){
                        echo "<li> $me </li>";
                    }
                }
                echo "</ul>"
               ?>
               <input type="text" placeholder="Username"   name="username">
               <input type="email" placeholder="Email"  name="email">
               <input type="password" placeholder="Password"   name="password">
               <input type="password" placeholder="Confirm Password"   name="passwordRepeat">
               <button class="form-btn" type="submit" name="submit">Sign up</button>
               <span class="has-seperator">Or</span>
               <a class="facebook-login" href="#">
                   <i class="fab fa-facebook"></i>Log in with Facebook
               </a>
               <a class="password-reset" href="forgotPassword.php" >Forgot password?</a>
           </form>   
           <div class="sign-up">
               Have an account?<a href="login.php">Login</a>
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