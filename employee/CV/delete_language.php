<?php
    session_start();
    if(!isset($_SESSION['id'])){
        die("Please <a href='../login.php'>Login</a>!");
    }
    include('../../db.php');
    if(isset($_GET['id'])){
        $sql = "DELETE FROM `language` WHERE `language`.`id` = '". $_GET['id'] ."'";
        if ($conn->query($sql) === TRUE) {
            header("Location: make_cv.php");  
        } else {
            echo "Error: " . $sql . "<br>";
        }
    }
?>