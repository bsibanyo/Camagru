<?php

$DB_DSN = 'mysql:dbname=camagru;host=localhost';
$DB_USER = 'admin';
$DB_PASSWORD = 'admin4321';

try{
    $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 } catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}