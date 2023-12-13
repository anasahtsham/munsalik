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
            <form method="post" action="#">
                <div class="box darkBlueBackGround">
                    <?php
                        $sql = "SELECT `company_name` FROM `employer` WHERE `id` = '". $_SESSION['id'] ."'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            //$row['id'];  
                        }
                    ?>
                    <label> Update Company name</label> <br> <br>
                    <input type="text" name="company_name" placeholder="<?php echo $row['company_name']?>"> <br>
                    <button type="submit">Update</button> 
                    <button onclick="location.href='settings.php'" type="button">Go Back</button> 
                </div>
            </form>
            <?php
                $check = false;
                //f_name
                if (isset($_POST['company_name'])){
                    $company_name = $_POST['company_name'];
                    if($company_name == ""){
                        $company_name = $row['company_name'];
                    }
                    $sql = "UPDATE `employer` SET `company_name`='". $company_name ."' WHERE id = '". $_SESSION['id'] ."'";
                    if ($conn->query($sql) === TRUE) {
                        $check = true;
                    } else {
                        echo "Error: " . $sql . "<br>";
                    }
                }
                if($check){
                    echo "<meta http-equiv='refresh' content='0'>";
                }
            ?>
        </section>
    </body>
</html>