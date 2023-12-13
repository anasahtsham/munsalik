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
        <!-- Login Page -->
        <section id="login_page">
            <div class="box darkPurpleBackGround">
                    <button class="loginEmployee" onclick="location.href='employee/login.php'" type="button">Login <br> As Employee</button>
                    <button class="loginEmployer" onclick="location.href='employer/login.php'" type="button">Login <br> As Employer</button>   
                    <br>
                    <button onclick="location.href='index.php'" type="button">Cancel</button> 
            </div>
        </section>
    </body>
</html>