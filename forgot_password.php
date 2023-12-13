<?php
    include('db.php');
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
            <a href="index.php" id="munsalik_pk">Munsalik.pk</a>
            <p>Empowering Youth to Achieve Greatness</p>
        </nav>
        <!-- Register Page -->
        <section id="register_page">
            <div class="box darkPurpleBackGround">
                <h3>Send password reset request to: <a onclick="myFunction()">munsalik.pk@gmail.com</a></h3>
                <br><h3>Use your own email (<?php echo $_GET['email'] ?>)</h3>
                <h3>We will reset your password and send it to your email shortly</h3>
                <button onclick="location.href='register.php'" type="button">Return to Registration</button>
            </div>
        </section>
        <script>
            function myFunction() {
            // Copy the text inside the text field
            navigator.clipboard.writeText("munsalik.pk@gmail.com");
            alert("Email copied to clipboard: munsalik.pk@gmail.com");
            }
        </script>
    </body>
</html>