<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, innitial-scale=1.0, minimum-scale=1.0">
    <title>Forgot password</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div id="wrapper">
    <div class="container">
        <div class="form-data">
           <form action="">
               <div class="logo">
                   <img src="images/logo.png" alt="camagru">
               </div>
               <div class="error">
               <?php
                echo "<ul>";
                if(count($error) > 0) {
                    foreach ($error as $me){
                        echo "<li> $me </li>";
                    }
                }
                echo "</ul>"
               ?>
               </div>
               <input type="email" placeholder="Email" required>
               <button class="form-btn" type="submit">Send Login Link</button>
               <span class="has-seperator">Or</span>
               <a class="password-reset" href="index.php" >Create New Account</a>
           </form>   
           <div class="sign-up">
              <a href="login.php"> Back To Login</a>
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