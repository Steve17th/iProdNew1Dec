<?php
    include_once 'header.php';
    include_once './includes/dbh.inc.php';
    include_once './includes/functions.inc.php';
?>
<html>
    <div id="mySidenav" class="sidenav">
        <div class="topclosebtn"></div>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i style="padding-left: 5px;" class="fa-solid fa-user"></i></i>Profile</a>
        <a href="userHome.php"><i style="padding-left: 5px;"class="fa-solid fa-arrow-left"></i>My Dashboard</a>
        <a href="newTasks.php">New Task<i style="padding-left: 5px;" class="fa-solid fa-forward"></i></a>
        <a href="#">Work with Teams<i style="padding-left: 5px;" class="fa-solid fa-people-group"></i></a>
        <a href="health.php">Healthy Habits<i style="padding-left: 5px;" class="fa-regular fa-heart"></i></a>
        <a href="help.php">Help<i style="padding-left: 5px;" class="fa-solid fa-circle-info"></i></a>
        <a href="/includes/logout.inc.php" onclick="verifyLogout()">Log Out <i style="padding-left: 5px;" class="fa-regular fa-circle-xmark"></i></a> 
    </div>
    <!-- To open the sidenav -->
    <div id="menuNav" class="menuNav" onclick="openNav()">
        <p><strong>Menu</strong><i class="fa-solid fa-arrow-right"></i></p>
    </div>
    <div id ="mainPage" class="profileTasks cardEnt">
        <h2>Your Tasks</h2>
        <div class= "taskHeaders">
            <h4 style="display: flex;">
                <div style="margin-right: 180px;">Title</div> <div style="margin-right: 140px;">Deadline</div> <div style="margin-right: 100px;">Time Left</div>
            </h4>
        </div>
        <div style="color:#fff;" class="tasks">
        <?php
            if(isset($_SESSION["userId"])){
                $userId = $_SESSION["userId"];
                $sql = "SELECT * FROM tasks WHERE userId = $userId;";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $startTime = date("Y-m-d H:i:s");
                        $originalSTime = $row['startTime'];

                        //Checking if the task's start date is in the future.
                        $nowDiff =(date_diff(date_create($startTime),date_create($originalSTime)));
                        $now = $nowDiff ->format('%h');
                        if($now >0){
                            $sTime = $originalSTime;
                        }else{
                            $sTime = $startTime;
                        }
                        $endTime =$row['endTime'];
                        $time = date_diff(date_create($sTime),date_create($endTime));
                        $dur = $time ->format('%a Days and %h hours');
                        $titles = $row['taskTitle'];
                        $deadline = $row['endTime'];
                        $description = $row['taskDescription'];
                        $taskID = $row['taskId'];
                        echo "<form method=\"POST\"><div class=\"taskDisplay\"><p  style=\"padding:10px;\"> <span style=\"display: inline-block; width: 100px; margin-right: 100px;overflow: hidden; text-overflow: ellipsis; white-space: nowrap;\"><strong>".  $titles .":</strong>
                         </span><span style=\"display: inline-block; width: 170px; margin-right: 30px;overflow: hidden; text-overflow: ellipsis; white-space: nowrap; \">" .$deadline ." 
                         </span><span style=\"display: inline-block; width: 200px; margin-right: 20px;overflow: hidden; text-overflow: ellipsis; white-space: nowrap; \">". $dur ."</span> 
                            <input style=\" margin-right:20px;\" type=\"submit\" formaction=\"viewTask.php?id='".$taskID."'\" name=\"viewTask\" value=\"Open\" class=\"signupbtn b1\">
                            <input style=\"background-color: green; margin-right:20px;\" type=\"submit\" formaction=\"editTask.php?id='".$taskID."'\" name=\"editTask\" value=\"Edit\" class=\"b1 signupbtn\"> 
                            <input style=\"background-color: red;\" type=\"submit\" formaction=\"deleteTask.php?id='".$taskID."'\" name=\"deleteTask\" value=\"Delete\" class=\"b1 signupbtn\">
                        </form>";
                         $t = $time ->format('%h'); //hours
                         $t2 = $time -> format('%a'); //days
                         if($t<4 && $t2==0){
                            echo "<script type=\"text/javascript\"> alert(\"Hey, Your deadlines are approaching... Remember to check up on your pending tasks!\");</script>";
                         }
                         

                        // echo 
                    }
                }else{
                    echo "<h2 style=\"margin-right: 50px;\">Nothing to see here... You seem to be free for the day!</h2>";
                }
            }else{
                    header("location: ../index.php");
                    exit();
            }
        ?></div>
    </div>
    <script src="/js/sidenav.js"></script>
</html>
