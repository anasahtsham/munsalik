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

            <div class="TABLE">
                    <table>
                        <tr>
                            <th>Company Name</th>
                            <th>Email</th>
                            <th>Deadline</th>
                            <th>Invited For</th>
                            <th>Message form Employer</th>
                        </tr>
                        <?php
                            $sql = "SELECT * FROM `request` WHERE employee_id = ". $_SESSION['id'] ."";
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                                while($row_req = $result->fetch_assoc()){
                                    $sql_emp = "SELECT * FROM `employer` WHERE id = '". $row_req['employer_id'] ."'";
                                    $result_emp = $conn->query($sql_emp);
                                    if ($result_emp->num_rows > 0) {
                                        $row_emp = $result_emp->fetch_assoc();
                                    }
                                    ?>  <tr>
                                            <td><?php echo $row_emp["company_name"]; ?></td>
                                            <td><?php echo $row_emp["email"]; ?></td>
                                            <td><?php echo $row_req["last_date"]; ?></td>
                                            <td><?php if ($row_req['type'] == 1) { echo "Interview";} if ($row_req['type'] == 2) { echo "Job";} ?></td>    
                                            <td><?php echo $row_req["note"]; ?></td>                                        
                                        </tr>
                                    <?php
                                }
                            }
                        ?>
                        
                    </table>                    
                </div>

                <br>
                <button onclick="location.href='homepage.php'" type="button">Go Back</button>
            </div>
        </section>
    </body>
</html>