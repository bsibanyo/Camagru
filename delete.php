<?php

require_once 'config/database.php';

function delete($id){
    global $conn;
    try{
        $query = "DELETE FROM images WHERE id='$id' LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->execute();
    }
    catch(PDOException $e){
        echo 'unable to delete from the database '.$e->getMessage();
    }
}

if(isset($_GET['rm'])){
    delete($_GET['id']);
    header("location: profile.php");
}

?>