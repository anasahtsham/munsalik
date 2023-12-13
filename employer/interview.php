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
            <div class="box darkBlueBackGround">
                <form action="#" method="post">
                    <h3>Offer Interview to <?php 
                        if(isset($_GET['emp_id'])){
                            $sql = "SELECT * FROM `employee` WHERE id = '" . $_GET['emp_id'] . "'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                echo $row['f_name'];
                                echo " ";
                                echo $row['l_name'];
                            }
                        }
                    ?></h3> <br>
                    <label>Interview Valid Till:</label>  <br> <br>
                    <input type="date" name="last_date">  <br>  <br>
                    <label>Message for the Candidate:</label>  <br> <br>
                    <textarea name="note" cols="30" rows="10"></textarea> <br>
                    <button type="submit">Send Invitation</button>
                    <button onclick="location.href='view.php'" type="button">Back</button> <br>
                    <?php
                        if(isset($_POST['last_date']) && isset($_POST['note'])){
                            $last_date = $_POST['last_date'];
                            $note = $_POST['note'];
                            $sql = "INSERT INTO `request` (`employee_id`, `employer_id`, `type`, `last_date`, `note`) 
                                VALUES ('". $_GET['emp_id'] ."', '". $_SESSION['id'] ."', '1', '". $last_date ."', '". $note ."');";
                            if ($conn->query($sql) === TRUE) {
                                echo "Interview Invitation Sent!";
                            } else {
                                echo "Error: " . $sql . "<br>";
                            }
                        }
                    ?>
                </form>
            </div>
        </section>
    </body>
</html>