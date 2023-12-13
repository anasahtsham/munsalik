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
                <form method="post" action="#" autocomplete="off">
                    <p>Email</p>
                    <input type= "text" name="email" placeholder="email"autocomplete="off"> <br>
                    <p>Password</p>
                    <input type= "password" name="password" placeholder="password" autocomplete="off"> <br> 
                    <input type= "password" name="c_password" placeholder="confirm password"> <br> <br>
                    
                    <label for="stakeholder">Register as:</label>
                    <select name="stakeholder">
                        <option value=1>Employee</option>
                        <option value=2>Employer</option>
                    </select> <br> <br> <br> <br>
                    <br>
                    <button type="submit">Register</button>
                    <button onclick="location.href='index.php'" type="button">Back</button>       
                </form>
                <!-- PHP CODE -->
                <?php
                if (isset($_POST['email']) &&
                isset($_POST['password']) &&
                isset($_POST['c_password']) &&
                isset($_POST['stakeholder'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $c_password = $_POST['c_password'];
                    $stakeholder = $_POST['stakeholder'];
                    //echo $stakeholder;
                    if ($stakeholder == 1) {
                        if ($email != "") {
                            if ($password == $c_password) {
                                $sql = "SELECT email FROM employee";
                                $result = $conn->query($sql);
                                $check = true;
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()){
                                        if ($email == $row['email']) {
                                            $check = false;
                                        }
                                    }  
                                }
                                if ($check) {
                                   $sql = "INSERT INTO `employee`(`email`, `password`, `f_name`, `l_name`, `ph_no`, `city`, `emp_status`, `job_wanted`) 
                                        VALUES ('" . $email . "','" . md5($password) . "','NULL','NULL','NULL','NULL','NULL','NULL')";
                                    if ($conn->query($sql) === TRUE) {
                                        echo "Resigtration Successful";
                                    } else {
                                        echo "Error: " . $sql . "<br>";
                                    }
                                }
                                else{
                                    echo "You already have an account! <br>";
                                    ?> <button onclick="location.href='forgot_password.php?email=<?php echo $email;?>'" type="button">Forgot Password?</button> <?php
                                }                                
                            } else {
                                echo "Passwords do not match";
                            }
                        } else {
                            echo "Cannot be Empty";
                        }
                    }
                    if ($stakeholder == 2) {
                        if ($email != "") {
                            if ($password == $c_password) {
                                $sql = "INSERT INTO `employer`(`email`, `password`, `company_name`) VALUES ('" . $email . "','" . md5($password) . "','NULL')";
                                if ($conn->query($sql) === TRUE) {
                                    echo "Resigtration Successful";
                                } else {
                                    echo "Error: " . $sql . "<br>";
                                }
                            } else {
                                echo "Passwords do not match";
                            }
                        } else {
                            echo "Cannot be Empty";
                        }
                    }
                }
                ?>
            </div>
        </section>
    </body>
</html>