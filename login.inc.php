<?php
session_start();
require 'config/database.php';

$msg = "";
if(isset($_POST['submit'])){
    try{
		if (!empty($_POST['username']) || !empty($_POST['password'])){
			$username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            
            if (!isset($username) || empty($username)){
                $msg = "username input is empty!";
            }
		    else if (!isset($password) || empty($password) || !(strlen($password) >= 6) || (!preg_match('/(?=.*[a-z])(?=.*[0-9]).{6,}/i', $password))){
			    $msg = "password input is empty!";
			        if (!(strlen($password) >= 6)){
				        $msg = "password length is too short, must be atleast 6 characters long!";
			        }
			        if (!preg_match('/(?=.*[a-z])(?=.*[0-9]).{6,}/i', $password)){
				        $msg = "Password must contain letters and digits";
			        }
            }
            else if (isset($username) && !empty($username) && isset($password) && !empty($password)){
                $con = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $con->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $result = $stmt->fetch();
          
            if (!$result)
				$msg = 'You have not verified your account, check your email!';
			else{
                    if ($result['isEmailConfirmed'] == true)
                    {
                        $validpassword = password_verify($password, $result['password']);
                        if ($validpassword){
                            $_SESSION['username'] = $result['username'];
                            header('Location: home.php');
                        }
                        else{
                            $msg = 'Incorrect username or password combination!';
                        }
                        
                    }
                    else
                        $msg = 'Could not access credentials through database!';
                    }
                 }
            }
        }
	    catch(PDOException $e){
		    echo "Error :".$e->getMessage();
    }
}
?>
