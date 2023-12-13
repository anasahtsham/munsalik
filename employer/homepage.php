<?php
    session_start();
    if(!isset($_SESSION['id'])){
        die("Please <a href='../login.php'>Login</a>!");
    }
    include('../db.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/3d33a6f40f.js" crossorigin="anonymous"></script>
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@100;200;300;400;500;600;700;800;900&family=Exo+2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- CSS Stylesheet -->
        <link rel="stylesheet" href="css/style.css">
        <title>Munsalik</title>
    </head>
    <body>
        <!-- Header Section -->
        <nav>
            <a href="homepage.php" id="munsalik_pk">Munsalik.pk</a>
            <p><?php 
            echo $_SESSION['email'];
            //echo " ("; echo $_SESSION['id'];  echo ")";                 
            ?></p>
        </nav>
        <!-- Homepage Content -->
        <section class="homepage_content">
            <div class="bigBox darkBlueBackGround">
                <?php
                    
                    $sql = "SELECT * FROM `employer` WHERE `id` = '". $_SESSION['id'] ."'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        if ($row['company_name'] == 'NULL') {
                            ?> <button onclick="location.href='company_name.php'" type="button">ATTENTION! PLEASE SET YOUR COMPANY NAME FIRST</button>  <?php
                        }
                    }
                ?>
                
                <button onclick="location.href='view.php'" type="button">View All Candidates</button> 
                <button onclick="location.href='view_reqs.php'" type="button">View Sent Requests</button> 
                <button onclick="location.href='settings.php'" type="button">Account Settings</button> 
                <button onclick="location.href='../logout.php'" type="button">Log Out</button>
            </div>
        </section>
    </body>
</html>