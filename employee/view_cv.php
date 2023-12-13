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
            ?></p>
        </nav>
        <!-- Homepage Content -->
        <section class="homepage_content">
            <div class="box darkBlueBackGround">
                <div class="cv_view">
                    <?php
                        $sql = "SELECT * FROM `employee` WHERE `id` = '". $_SESSION['id'] ."'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            //$row['id'];  
                        }
                    ?>
                    
                    <h2><?php echo $row['f_name']; echo " "; echo $row['l_name'] ?></h2>
                    <label> <?php echo $row['self_note'];?> </label>  <br>  <br> <br>                 
                    <label>Status : <?php echo " "; 
                        if($row['emp_status'] == 1){
                            echo "Employed";
                        }
                        if ($row['emp_status'] == 2) {
                            echo "Looking for an opportunity";
                        }
                    ?> </label>
                    <br>
                    <label for="city">Situated in :<?php echo ' '; echo $row['city'];?></label><br>
                    
                    <!-- <div class="display_picture">
                        <img src="" alt="">
                    </div> -->
                    <br><br>
                    <?php
                        $sql = "SELECT * FROM `education` WHERE `employee_id` = '". $row['id'] ."'";
                        $result_edu = $conn->query($sql);                                
                        if ($result_edu->num_rows > 0) {
                            echo '<h2>Education</h2>
                                    <div class="TABLE">
                                        <table>
                                        <tr>
                                            <th>Qualification</th>
                                            <th>Institute</th>
                                            <th>Year of Completion</th>
                                        </tr>';
                            while ($row_edu = $result_edu->fetch_assoc()) {
                                echo '
                                    <tr>
                                        <td>'. $row_edu["degree"] .'</td>
                                        <td>'. $row_edu["institute"] .'</td>
                                        <td>'. $row_edu["year_of_comp"] .'</td>
                                    </tr>
                                ';
                            }
                            echo '</table> </div>';
                        }
                    ?>

                    


                    <br><br>

                    <?php
                        $sql = "SELECT * FROM `skill` WHERE `employee_id` = '". $row['id'] ."'";
                        $result_edu = $conn->query($sql);                                
                        if ($result_edu->num_rows > 0) {
                            echo '<h2>Skills</h2>
                                    <div class="TABLE">
                                        <table>
                                        <tr>
                                            <th>Skill</th>
                                            <th>Years of Experience</th>
                                        </tr>';
                            while ($row_edu = $result_edu->fetch_assoc()) {
                                echo '
                                    <tr>
                                        <td>'. $row_edu["skill"] .'</td>
                                        <td>'. $row_edu["years_of_exp_skill"] .'</td>
                                    </tr>
                                ';
                            }
                            echo '</table> </div>';
                        }
                    ?>


                    <br><br>

                    <?php
                        $sql = "SELECT * FROM `past_job` WHERE `employee_id` = '". $row['id'] ."'";
                        $result_edu = $conn->query($sql);                                
                        if ($result_edu->num_rows > 0) {
                            echo '<h2>Past Jobs</h2>
                                    <div class="TABLE">
                                        <table>
                                        <tr>
                                            <th>Designation</th>
                                            <th>Name of Company</th>
                                            <th>Salary</th>
                                            <th>Duration (Years)</th>
                                        </tr>';
                            while ($row_edu = $result_edu->fetch_assoc()) {
                                echo '
                                    <tr>
                                        <td>'. $row_edu["designation"] .'</td>
                                        <td>'. $row_edu["company"] .'</td>
                                        <td>'. $row_edu["salary"] .'</td>
                                        <td>'. $row_edu["duration"] .'</td>
                                    </tr>
                                ';
                            }
                            echo '</table> </div>';
                        }
                    ?>


                    <br><br>

                    <?php
                        $sql = "SELECT * FROM `language` WHERE `employee_id` = '". $row['id'] ."'";
                        $result_edu = $conn->query($sql);                                
                        if ($result_edu->num_rows > 0) {
                            echo '<h2>Languages</h2>
                                    <div class="TABLE">
                                        <table>
                                        <tr>
                                            <th>Language</th>
                                            <th>Strength (1-5)</th>
                                        </tr>';
                            while ($row_edu = $result_edu->fetch_assoc()) {
                                echo '
                                    <tr>
                                        <td>'. $row_edu["language"] .'</td>
                                        <td>'. $row_edu["strength"] .'</td>
                                    </tr>
                                ';
                            }
                            echo '</table> </div>';
                        }
                    ?>


                    <br><br>


                    <h2>Contact Me</h2>

                    <label for="mobile-no"> <?php  echo ' '; echo $row['ph_no']; ?></label><br>
                    <label for="desired-job"> <?php echo $row['email']; ?></label>
                    


                    <br><br>


                    <h2>Desired Job</h2>

                    <label for="desired-job"><?php echo $row['job_wanted'];?></label><br><br> <br><br>
                    

                    
                    <button onclick="location.href='homepage.php'" type="button">Go Back</button>
                </div>
            </div>
        </section>
    </body>
</html>