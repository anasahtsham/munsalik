<?php
    session_start();
    if(!isset($_SESSION['id'])){
        die("Please <a href='../login.php'>Login</a>!");
    }
    include('../db.php');
    if(isset($_GET['req_id'])){
        $sql = "DELETE FROM `request` WHERE `request`.`id` = '". $_GET['req_id'] ."'";
        if ($conn->query($sql) === TRUE) {
            header("Location: view_reqs.php");  
        } else {
            echo "Error: " . $sql . "<br>";
        }
    }
?>