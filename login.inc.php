<?php
require 'config/database.php';


try
{
       
		if (!empty($_POST['username']) || !empty($_POST['password']))
		{
			$username = htmlspecialchars($_POST['username']);
            $Password = htmlspecialchars($_POST['password']);
            
        //  var_dump($username);
		// Check for errors
		if (!isset($username) || empty($username))
		{
			echo "! username input is invalid<br>";
		}
		else if (!isset($Password) || empty($Password) || !(strlen($Password) > 6) || (!preg_match('/(?=.*[a-z])(?=.*[0-9]).{6,}/i', $Password)))
		{
			echo "! Password input is invalid<br>";
			if (!(strlen($Password) > 6))
			{
				echo "! Password length is too short, must be atleast 6 characters long<br>";
			}
			if (!preg_match('/(?=.*[a-z])(?=.*[0-9]).{6,}/i', $password))
			{
				echo "! Passowrd must contain letters and digits<br>";
			}
        }
        else if (isset($username) && !empty($username) && isset($password) && !empty($password))
		{
            $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
            // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
          $stmt->bindParam(':username', $username);
          $stmt->execute();
          $result = $stmt->fetch();
          if (!$result)
				die('Could not access credentials through database!');
			else
			{
                  var_dump($result);
				if ($result['isEmailConfirmed'] == true)
				{
					$validpassword = password_verify($password, $result['Password']);
					if ($validpassword)
					{   
						
						$_SESSION['username'] = $result['username'];
						
						header('Location: gallery.php');
                        exit;
                        
					} 
					else
						die('Incorrect username / password combination!');
				}
				else
					die('You have not verified your account, check your email!');
			}
		}
		else 
			die('Something went wrong...');
	}
}

	catch(PDOException $e)
	{
		echo $stmt . "<br>" . $e->getMessage();
    }

	$conn = null;
?>

