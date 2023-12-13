<?php
    session_start();
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
            <a href="../index.php" id="munsalik_pk">Munsalik.pk</a>
            <p>Employer Login</p>
        </nav>
        <!-- Login Page -->
        <section id="login_page">
            <div class="box darkBlueBackGround">
            <form method="post" action="#">
                    <p>Enter Details</p>
                    <input type="text" name="email" placeholder="email"> <br>
                    <input type="password" name="password" placeholder="password"> <br> 
                    <button type="submit">Submit</button>
                    <button onclick="location.href='../login.php'" type="button">Return</button> 
                </form>
                <!-- PHP CODE -->
                <?php
                    if (isset($_POST['email']) && isset($_POST['password'])){
                        $email = $_POST['email'];
                        $password = $_POST['password'];

                        //Query
                        $sql = "SELECT * FROM `employer` WHERE `email` = '". $email ."' and `password` = '". md5($password) ."'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $_SESSION['id'] = $row['id'];  
                            $_SESSION['email'] = $row['email'];  
                            header("Location: homepage.php");
                        } else {
                        echo "Username or Password is incorrect";
                        }
                    }
                ?>
            </div>
        </section>
    </body>
</html>