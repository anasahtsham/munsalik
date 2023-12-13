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
                <form action="#" method="post">
                    <label>City</label>
                    <input style="width: 9%;" type="text" name="search_city"> <?php echo" ";?>
                    <label>Job</label>
                    <input style="width: 9%;" type="text" name="search_job"> <?php echo" ";?>
                    <label>Status:</label>
                    <input style="width: 15px; height: 15px;" type="radio" id="Employed" name="status" value="1">
                    <label for="html">Employed</label>  
                    <input style="width: 15px; height: 15px;" type="radio" id="Un-employed" name="status" value="2" checked="checked">
                    <label for="css">Un-employed</label>
                    <button style="width: 5%;" type='submit'>Search</button>
                    <button style="width: 9%;"onclick="location.href='refresh.php'" type="button"> Reset Filters </button>
                    <br> <br>
                </form>
                

                <div class="TABLE">
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>City</th>
                            <th>Desired Job</th>
                            <th>Status</th>
                            <th>CV</th>
                            <th>Send Email</th>
                        </tr>
                        <?php
                            $sql;
                            if (isset($_POST['search_city']) &&
                            isset($_POST['search_job']) &&
                            isset($_POST['status'])) {
                                if ($_POST['search_city'] != '' && $_POST['search_job'] != '') {
                                    $sql = "SELECT * FROM `employee` WHERE `city` = '". $_POST['search_city'] ."' AND `emp_status` = '". $_POST['status'] ."' AND `job_wanted` = '". $_POST['search_job'] ."'";
                                }else if ($_POST['search_city'] == '' && $_POST['search_job'] != '') {
                                    $sql = "SELECT * FROM `employee` WHERE `emp_status` = '". $_POST['status'] ."' AND `job_wanted` = '". $_POST['search_job'] ."'";
                                }else if ($_POST['search_city'] != '' && $_POST['search_job'] == '') {
                                    $sql = "SELECT * FROM `employee` WHERE `city` = '". $_POST['search_city'] ."' AND `emp_status` = '". $_POST['status'] ."'";
                                }else {
                                    $sql = "SELECT * FROM `employee` WHERE `emp_status` = '". $_POST['status'] ."'";
                                }
                            }
                            else{
                                $sql = "SELECT * FROM `employee`";
                            }
                            
                            $result = $conn->query($sql);                            
                            if ($result->num_rows > 0) {
                                while($row_emp = $result->fetch_assoc()){
                                    if(($row_emp["f_name"] != 'NULL') &&
                                    ($row_emp["l_name"] != 'NULL') &&
                                    ($row_emp["city"] != 'NULL') &&
                                    ($row_emp["job_wanted"] != 'NULL')){
                                        ?>  <tr>
                                                <td><?php echo $row_emp["f_name"]; echo " "; echo $row_emp["l_name"]; ?></td>
                                                <td><?php echo $row_emp["city"]; ?></td>
                                                <td><?php echo $row_emp["job_wanted"]; ?></td>
                                                <td><?php if($row_emp['emp_status']==1){echo"Employed";}if($row_emp['emp_status']==2){echo"Un-employed";}?></td>
                                                <td> <a href = "view_cv.php?emp_id=<?php echo $row_emp["id"] ?>&&return_to=1" > <button> CV </button> </a>  </td>
                                                <td> <a href="interview.php?emp_id=<?php echo $row_emp["id"]?>"> <button>Interview</button></a> <a href="proposal.php?emp_id=<?php echo $row_emp["id"]?>"><button>Job Proposal</button></a></td>
                                            </tr>
                                        <?php
                                    }   
                                }
                            }
                            else{
                                ?><td colspan="6">NO RESULTS FOUND</td><?php
                            }
                        ?>
                    </table>                    
                </div>
                <br>
                <button onclick="location.href='homepage.php'" type="button">Back</button>
            </div>
        </section>
    </body>
</html>