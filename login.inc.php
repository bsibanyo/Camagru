<?php
require 'config/database.php';

$error = array();

if(isset($_POST['submit'])){
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);
	
	if(empty($username) || empty($password)){
		$error["Error"] = "empty fields";
	}
	else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
		$error["usernameError"] = "invalid username";  
	}
	else if ((strlen($password) <= 6)){
		$error["passwordLength"] = "Password must be 6 or more'.'<br>'.'characters long!";
	}
	else if(!preg_match('/(?=.*[a-z])(?=.*[0-9]).{6,}/i', $password)){
		$error["passwordLength"] = "Password must contain letters and digits";
	}
	else if (!empty($username) && !empty($password))
		{
          $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
          $stmt->bindParam(':username', $username);
          $stmt->execute();
          $result = $stmt->fetch();
          if (!$result)
				die('Could not access credentials through database!');
			else
			{
                //   var_dump($result);
				if ($result['isEmailConfirmed'] == true)
				{
					$validpassword = password_verify($password, $result['password']);
					if ($validpassword)
					{   
						
						$_SESSION['username'] = $result['username'];
						
						header('Location: home.php');
					} 

				}
			}
		}
}

