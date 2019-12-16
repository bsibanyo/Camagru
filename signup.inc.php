<?php
    include 'config/database.php';
    session_start();

    $msg = "";
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordRepeat = $_POST['passwordRepeat'];
        $hashed = password_hash($password, PASSWORD_BCRYPT);
        $token = bin2hex(openssl_random_pseudo_bytes(16));
        $isEmailConfirmed = FALSE;
        
        if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat) ){
             $msg = "empty fields";
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
                 $msg = "invalid email";                           //if the user didn't fill in all the details, this will send him back to the main page with email && username
        }
        else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            $msg = "invalid username";  
        }
        else if ((strlen($password) <= 6)){
            $msg = "Password must be 6 or more'.'<br>'.'characters long!";
        }
        else if(!preg_match('/(?=.*[a-z])(?=.*[0-9]).{6,}/i', $password)){
            $msg = "Password must contain letters and digits";
        }
        else if($password !==  $passwordRepeat){
            $msg = "passwords do not match!";
        }
        else {
        
                    $stm = $conn->prepare("SELECT * FROM users WHERE email = :email OR username = :username");              //checking if email already exist!
                    $stm->bindParam(":email", $email, PDO::PARAM_STR);
                    $stm->bindParam(":username", $username, PDO::PARAM_STR);
                    $stm->execute();
                    $row = $stm->fetch(PDO::FETCH_ASSOC);
                    if($row['email'] == $email){
                        $msg = "email already exist!";
                    }else if($row['username'] == $username){
                        $msg = "username already exist!";
                    }
                    else {
                        // prepare sql and bind parameters
                        $stmt = $conn->prepare("INSERT INTO users (username, email, password, token, isEmailConfirmed)
                        VALUES (:username, :email, :password, :token, :isEmailConfirmed)");
                        $stmt->bindParam(':username', $username);
                        $stmt->bindParam(':email', $email);
                        $stmt->bindParam(':password', $hashed);
                        $stmt->bindParam(':token', $token);
                        $stmt->bindParam(':isEmailConfirmed', $isEmailConfirmed, PDO::PARAM_BOOL);
                        //$stmt->execute();

                        if ($stmt->execute()) {
                            $user_id = $conn->lastInsertId();
                            $_SESSION['id'] = $user_id;
                            $_SESSION['username'] = $username;
                            $_SESSION['email'] = $email;
                            $_SESSION['isEmailConfirmed'] = $isEmailConfirmed;
                        }
        
                        // sendmail php   
        
                        $message = "
                        Congratulations $username!, 
                        Your account has been created, you can now login using your username and password.
                        Please click the link below to activate your account:
                        http://localhost:8080/camagru/verify.php?email=$email&token=$token
        
        
        
                        Kind regards,
                        Camagru Team
        
        
                        ";
        
        
        
        
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        $headers .= 'From: <noreply@camagru.co.za>' . "\r\n";
                        mail("$email", "Verification", "$message", "$header");
    
                        header("Location: verify_account_msg.php");
                    }
                }
           


        
    }
?>