<?php
    session_start();
    
    if(!isset($_SESSION['id'])){
        die("Please <a href='../../login.php'>Login</a>!");
    }
    include('../../db.php');
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
        <link rel="stylesheet" href="../css/style.css">
        <title>Munsalik</title>
    </head>
    <body>
        <!-- Header Section -->
        <nav>
            <a href="../homepage.php" id="munsalik_pk">Munsalik.pk</a>
            <p><?php 
            echo $_SESSION['email'];
            //echo " ("; echo $_SESSION['id'];  echo ")";                 
            ?></p>
        </nav>
        <!-- Homepage Content -->
        <section class="homepage_content">
            <div class="box darkBlueBackGround">
                <div class="cv_content">
                    <form method="post" action="#">

                        <?php
                            $sql = "SELECT * FROM `employee` WHERE `id` = '". $_SESSION['id'] ."'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                //$row['id'];  
                            }
                        ?>

                        <h2>Personal Details</h2>
                        <label for="f_name">First Name</label> <br>
                        <input type="text" name="f_name" placeholder="<?php echo $row['f_name'] ?>"> <br> <br>
                        <label for="l_name">Last Name</label> <br>
                        <input type="text" name="l_name" placeholder="<?php echo $row['l_name'] ?>"> <br> <br>
                        <label for="self_note">Some Words About Yourself</label> <br>
                        <textarea name="self_note"><?php echo $row['self_note'] ?></textarea> <br> <br>
                        <label for="emp_status">Employment Status</label>
                        <?php
                            if($row['emp_status'] == 2){
                                ?>
                                    <select name="emp_status" id="emp_status">
                                        <option value=2>Un-employed</option> 
                                        <option value=1>Employed</option> 
                                    </select> 
                                <?php
                            }
                            else{
                                ?>
                                    <select name="emp_status" id="emp_status">
                                        <option value=1>Employed</option> 
                                        <option value=2>Un-employed</option> 
                                    </select> 
                                <?php
                            }
                        ?>
                        
                        <br> <br>
                        <!-- <label for="profile_picture">Upload Picture</label>
                        <input type="file" name="pictureURL" id="profile-picture"> -->
                
                        <br><br>
                        <h2>Education Details</h2>

                        <label for="degree">Degree</label> <br>
                        <input type="text" name="degree"> <br> <br>

                        <label for="institute">Institute</label> <br>
                        <input type="text" name="institute"> <br> <br>

                        <label for="year_of_comp">Year of Completion </label> <br>
                        <input type="text" name="year_of_comp"> <br> <br>
                            
                        <button type="submit">+ ADD</button>

                        <div class="TABLE">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Degree</th>
                                        <th>Institute</th>
                                        <th>Year of Completion</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM `education` WHERE `employee_id` = '". $row['id'] ."'";
                                        $result_edu = $conn->query($sql);                                
                                        if ($result_edu->num_rows > 0) {
                                            while ($row_edu = $result_edu->fetch_assoc()) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row_edu["degree"]; ?></td>
                                                        <td><?php echo $row_edu["institute"]; ?></td>
                                                        <td><?php echo $row_edu["year_of_comp"]; ?></td>
                                                        <td><button onclick="location.href='delete_education.php?id=<?php echo $row_edu['id']?>'" type="button"> Remove </button></td> 
                                                    </tr>
                                                <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <br><br>
                        
                        
                        <br><br>
                        <h2>Skill Set</h2>

                        <label for="skill">Skill</label> <br>
                        <input type="text" name="skill"> <br> <br>

                        <label for="years_of_exp_skill">Years of Experience</label> <br>
                        <input type="text" name="years_of_exp_skill"> <br> <br>


                        <button type="submit">+ ADD</button>

                        <div class="TABLE">
                        <table>
                            <tr>
                                <th>Skill</th>
                                <th>Years of Experience</th>
                                <th>Remove</th>
                            </tr>
                            <?php
                                $sql = "SELECT * FROM `skill` WHERE `employee_id` = '". $row['id'] ."'";
                                $result_skill = $conn->query($sql);                                
                                if ($result_skill->num_rows > 0) {
                                    while ($row_skill = $result_skill->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row_skill["skill"]; ?></td>
                                                <td><?php echo $row_skill["years_of_exp_skill"]; ?></td>
                                                <td><button onclick="location.href='delete_skill.php?id=<?php echo $row_skill['id']?>'" type="button"> Remove </button></td> 
                                            </tr>
                                        <?php
                                    }
                                }
                            ?>
                        </table>
                        </div>
                        <br><br>
                        
                        <br><br>
                        <h2>Past Jobs (if any)</h2>

                        <label for="designation">Designation</label> <br>
                        <input type="text" name="designation"> <br> <br>

                        <label for="company">Name of Company</label> <br>
                        <input type="text" name="company"> <br> <br>

                        <label for="salary">Salary</label> <br>
                        <input type="text" name="salary"> <br> <br>

                        <label for="duration">Duration (Years)</label> <br>
                        <input type="text" name="duration"> <br> <br>

                        <button type="submit">+ ADD</button>
                        
                        
                        <div class="TABLE">
                        <table>
                            <tr>
                                <th>Designation</th>
                                <th>Name of Company</th>
                                <th>Salary</th>
                                <th>Duration (Years)</th>
                                <th>Remove</th>
                            </tr>
                            <?php
                                $sql = "SELECT * FROM `past_job` WHERE `employee_id` = '". $row['id'] ."'";
                                $result_job = $conn->query($sql);
                                if ($result_job->num_rows > 0) {
                                    while ($row_job = $result_job->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row_job["designation"]; ?></td>
                                                <td><?php echo $row_job["company"]; ?></td>
                                                <td><?php echo $row_job["salary"]; ?></td>
                                                <td><?php echo $row_job["duration"]; ?></td>
                                                <td><button onclick="location.href='delete_job.php?id=<?php echo $row_job['id']?>'" type="button"> Remove </button></td> 
                                            </tr>
                                        <?php
                                    }
                                }
                            ?>
                        </table>
                        </div>                       
                        <br><br>
                        
                        <br><br>
                        <h2>Learnt Languages</h2>
                        <div class="TABLE">

                        <label for="language">Language</label> <br>
                        <input type="text" name="language"> <br> <br>

                        <label for="strength">Strength (1-5)</label> <br>
                        <input type="text" name="strength"> <br> <br>

                        <button type="submit">+ ADD</button> <br>

                        <table>
                            <tr>
                                <th>Language</th>
                                <th>Strength (1-5)</th>
                                <th>Remove</th>
                            </tr>
                            <?php
                                $sql = "SELECT * FROM `language` WHERE `employee_id` = '". $row['id'] ."'";
                                $result_lang = $conn->query($sql);
                                if ($result_lang->num_rows > 0) {
                                    while ($row_lang = $result_lang->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row_lang["language"]; ?></td>
                                                <td><?php echo $row_lang["strength"]; ?></td>
                                                <td><button onclick="location.href='delete_language.php?id=<?php echo $row_lang['id']?>'" type="button"> Remove </button></td> 
                                            </tr>
                                        <?php
                                    }
                                }
                            ?>
                        </table>
                        </div>                     
                        <br><br>


                        <h2>Contact Info</h2>
                        <label for="ph_no">Mobile Number</label><br>
                        <input type="text" name="ph_no" placeholder="<?php echo $row['ph_no'] ?>"> <br>
                        <label for="city">City of Residence</label><br>
                        <input type="text" name="city" placeholder="<?php echo $row['city'] ?>"> <br>
                        <br><br>


                        <h2>Desired Job</h2>
                        <label for="job_wanted">Job Title</label><br>
                        <input type="text" name="job_wanted" placeholder="<?php echo $row['job_wanted'] ?>"> <br> <br><br>
                        <button type="submit">Save Changes</button>
                        <button onclick="location.href='../homepage.php'" type="button"> Return </button>
                        
                    </form>
                    <!-- PHP CODE -->
                    <?php
                        // if (isset($_POST['f_name']) && 
                        // isset($_POST['l_name']) &&
                        // isset($_POST['self_note']) &&
                        // isset($_POST['emp_status']) &&
                        // isset($_POST['ph_no']) &&
                        // isset($_POST['city']) &&
                        // isset($_POST['job_wanted'])){
                        //     $f_name = $_POST['f_name'];
                        //     $l_name = $_POST['l_name'];
                        //     $self_note = $_POST['self_note'];
                        //     $emp_status = $_POST['emp_status'];
                        //     $ph_no = $_POST['ph_no'];
                        //     $city = $_POST['city'];
                        //     $job_wanted = $_POST['job_wanted'];
                        //     $sql = "UPDATE `employee` SET 
                        //         `f_name`='" . $f_name . "',
                        //         `l_name`='" . $l_name . "',
                        //         `ph_no`='" . $ph_no . "',
                        //         `city`='" . $city . "',
                        //         `emp_status`='" . $emp_status . "',
                        //         `job_wanted`='" . $job_wanted . "',
                        //         `self_note`='" . $self_note . "' 
                        //         WHERE id = '" . $_SESSION['id'] . "'";
                        //     if ($conn->query($sql) === TRUE) {
                        //         echo "Saved Successfully";
                        //     } else {
                        //         echo "Error: " . $sql . "<br>";
                        //     }
                        // }
                        $check = false;
                        //f_name
                        if (isset($_POST['f_name'])){
                            $f_name = $_POST['f_name'];
                            if($f_name == ""){
                                $f_name = $row['f_name'];
                            }
                            $sql = "UPDATE `employee` SET `f_name`='". $f_name ."' WHERE id = '". $row['id'] ."'";
                            if ($conn->query($sql) === TRUE) {
                                $check = true;
                            } else {
                                echo "Error: " . $sql . "<br>";
                            }
                        }
                        //l_name
                        if (isset($_POST['l_name'])){
                            $l_name = $_POST['l_name'];
                            if($l_name == ""){
                                $l_name = $row['l_name'];
                            }
                            $sql = "UPDATE `employee` SET `l_name`='". $l_name ."' WHERE id = '". $row['id'] ."'";
                            if ($conn->query($sql) === TRUE) {
                                $check = true;
                            } else {
                                echo "Error: " . $sql . "<br>";
                            }
                        }
                        //self_note
                        if (isset($_POST['self_note'])){
                            $self_note = $_POST['self_note'];
                            if($self_note == ""){
                                $self_note = $row['self_note'];
                            }
                            $sql = "UPDATE `employee` SET `self_note`='". $self_note ."' WHERE id = '". $row['id'] ."'";
                            if ($conn->query($sql) === TRUE) {
                                $check = true;
                            } else {
                                echo "Error: " . $sql . "<br>";
                            }
                        }
                        //emp_status
                        if (isset($_POST['emp_status'])){
                            $emp_status = $_POST['emp_status'];
                            if($emp_status == ""){
                                $emp_status = $row['emp_status'];
                            }
                            $sql = "UPDATE `employee` SET `emp_status`='". $emp_status ."' WHERE id = '". $row['id'] ."'";
                            if ($conn->query($sql) === TRUE) {
                                $check = true;
                            } else {
                                echo "Error: " . $sql . "<br>";
                            }
                        }
                        //ph_no
                        if (isset($_POST['ph_no'])){
                            $ph_no = $_POST['ph_no'];
                            if($ph_no == ""){
                                $ph_no = $row['ph_no'];
                            }
                            $sql = "UPDATE `employee` SET `ph_no`='". $ph_no ."' WHERE id = '". $row['id'] ."'";
                            if ($conn->query($sql) === TRUE) {
                                $check = true;
                            } else {
                                echo "Error: " . $sql . "<br>";
                            }
                        }
                        //city
                        if (isset($_POST['city'])){
                            $city = $_POST['city'];
                            if($city == ""){
                                $city = $row['city'];
                            }
                            $sql = "UPDATE `employee` SET `city`='". $city ."' WHERE id = '". $row['id'] ."'";
                            if ($conn->query($sql) === TRUE) {
                                $check = true;
                            } else {
                                echo "Error: " . $sql . "<br>";
                            }
                        }
                        //job_wanted
                        if (isset($_POST['job_wanted'])){
                            $job_wanted = $_POST['job_wanted'];
                            if($job_wanted == ""){
                                $job_wanted = $row['job_wanted'];
                            }
                            $sql = "UPDATE `employee` SET `job_wanted`='". $job_wanted ."' WHERE id = '". $row['id'] ."'";
                            if ($conn->query($sql) === TRUE) {
                                $check = true;
                            } else {
                                echo "Error: " . $sql . "<br>";
                            }
                        }
                        //Education-TABLE
                        if (isset($_POST['degree']) &&
                        isset($_POST['institute']) &&
                        isset($_POST['year_of_comp'])
                        ){
                            $degree = $_POST['degree'];
                            $institute = $_POST['institute'];
                            $year_of_comp = $_POST['year_of_comp'];
                            if ($degree != "" && $institute != "" && $year_of_comp != "") {
                                $sql = "INSERT INTO `education`(`employee_id`, `degree`, `institute`, `year_of_comp`) 
                                VALUES ('". $row['id'] ."','". $degree ."','". $institute ."','". $year_of_comp ."')";
                                if ($conn->query($sql) === TRUE) {
                                    $check = true;
                                } else {
                                    echo "Error: " . $sql . "<br>";
                                }
                            }
                            
                        }
                        if (isset($_POST['delete_education'])) {
                            $delete_education = $_POST['delete_education'];
                            if ($delete_education != "") {
                                $sql = "DELETE FROM `education` WHERE `education`.`id` = '". $delete_education ."'";
                                $conn->query($sql);
                            }
                        }
                        //Skills-TABLE
                        if (isset($_POST['skill']) &&
                            isset($_POST['years_of_exp_skill'])
                        ){
                            $skill = $_POST['skill'];
                            $years_of_exp_skill = $_POST['years_of_exp_skill'];
                            if ($skill != "" && $years_of_exp_skill != "") {
                                $sql = "INSERT INTO `skill`(`employee_id`, `skill`, `years_of_exp_skill`) 
                                    VALUES ('" . $row['id'] . "','" . $skill . "','" . $years_of_exp_skill . "')";
                                if ($conn->query($sql) === TRUE) {
                                    $check = true;
                                } else {
                                    echo "Error: " . $sql . "<br>";
                                }
                            }
                        }
                        if (isset($_POST['delete_skill'])) {
                            $delete_education = $_POST['delete_skill'];
                            if ($delete_education != "") {
                                $sql = "DELETE FROM `skill` WHERE `skill`.`id` = '". $delete_skill ."'";
                                $conn->query($sql);
                            }
                        }
                        //Past_Job-TABLE
                        if (isset($_POST['designation']) &&
                        isset($_POST['company']) &&
                        isset($_POST['salary']) &&
                        isset($_POST['duration'])
                        ){
                            $designation = $_POST['designation'];
                            $company = $_POST['company'];
                            $salary = $_POST['salary'];
                            $duration = $_POST['duration'];
                            if ($designation != "" && $company != "" && $salary != "" && $duration != "") {
                            $sql = "INSERT INTO `past_job`(`employee_id`, `designation`, `company`,`salary`,`duration`) 
                            VALUES ('". $row['id'] ."','". $designation ."','". $company ."','". $salary ."','". $duration ."')";
                            if ($conn->query($sql) === TRUE) {
                                $check = true;
                            } else {
                                echo "Error: " . $sql . "<br>";
                            }
                            }
                        }
                        if (isset($_POST['delete_past_job'])) {
                            $delete_past_job = $_POST['delete_past_job'];
                            if ($delete_past_job != "") {
                                $sql = "DELETE FROM `past_job` WHERE `past_job`.`id` = '". $delete_past_job ."'";
                                $conn->query($sql);
                            }
                        }
                        //Language-TABLE
                        if (isset($_POST['language']) &&
                        isset($_POST['strength'])
                        ){
                            $language = $_POST['language'];
                            $strength = $_POST['strength'];
                            if ($language != "" && $strength != "") {
                            $sql = "INSERT INTO `language`(`employee_id`, `language`, `strength`) 
                            VALUES ('". $row['id'] ."','". $language ."','". $strength ."')";
                            if ($conn->query($sql) === TRUE) {
                                $check = true;
                            } else {
                                echo "Error: " . $sql . "<br>";
                            }
                            }
                        }
                        if (isset($_POST['delete_language'])) {
                            $delete_language = $_POST['delete_language'];
                            if ($delete_language != "") {
                                $sql = "DELETE FROM `language` WHERE `language`.`id` = '". $delete_language ."'";
                                $conn->query($sql);
                            }
                        }
                        if($check){
                            echo "Saved Successfully!";
                            echo "<meta http-equiv='refresh' content='0'>";
                        }
                    ?>
                </div>
            </div>
        </section>
    </body>
</html>