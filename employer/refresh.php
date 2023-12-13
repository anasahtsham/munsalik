<?php
    session_start();
    if(!isset($_SESSION['id'])){
        die("Please <a href='../login.php'>Login</a>!");
    }
    header("Location: view.php"); 
?>