<?php
include 'database.php';
try {
   /**
    * IF DATABASE EXIST DROP ELSE CREATE
    */
   $conn = new PDO("mysql:host=localhost", $DB_USER, $DB_PASSWORD);
   // set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $stmt = "Drop DATABASE IF EXISTS camagru;";
   $sql = "CREATE DATABASE IF NOT EXISTS camagru;";
   // use exec() because no results are returned
   $conn->exec($stmt);
   echo "Database dropped successfully<br>";
   $conn->exec($sql);
   echo "Database created successfully<br>";
   /**
    * IF DATABASE IS CREATED, CREATE TABLES
    */
   $db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $query = "CREATE TABLE users (
       id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
       username VARCHAR(255) NOT NULL,
       email VARCHAR(255) NOT NULL,
       password VARCHAR(255) NOT NULL,
       token VARCHAR(255) NOT NULL,
       isEmailConfirmed  BOOLEAN NOT NULL
       );";
   $db->exec($query);
        header("Location: ../index.php");
//    echo "users table created successfully<br>";
   }
   catch(PDOException $e)
   {
       echo $sql . "<br>" . $e->getMessage();
   }

   try {
    $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS images (
    `image_id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `image`VARCHAR(200) NOT NULL,
	`text` TEXT(30) NOT NULL
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table images created successfully<br>";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    