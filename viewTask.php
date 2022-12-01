<?php
    include_once 'header.php';
    include_once './includes/dbh.inc.php';
?>

<div>
    <a href="profile.php">
        <div class="menuNav">
            <p><strong>Back</strong><i class="fa-solid fa-arrow-left"></i></p>
        </div>
    </a>
    <div style="display:flex; color:var(--primary-color); font-weight:1000; justify-content:center; align-items:center;"><h2>View Task</h2></div>
        <div style="color:#fff;" class="viewT">
            <?php
                if(isset($_SESSION["userId"])){
                    $id = $_GET['id'];

                    if(isset($_GET['id'])){
                        $query = mysqli_query($conn, "select * from tasks where taskId = $id");

                        $res = mysqli_fetch_array($query);
                        $title= $res['taskTitle'];
                        $taskID = $res['taskId'];
                        $description = $res['taskDescription'];
                        $begin = $res['startTime'];
                        $finish = $res['endTime'];

                        $startTime = date("Y-m-d H:i:s");
                        $originalSTime = $res['startTime'];

                        $nowDiff =(date_diff(date_create($startTime),date_create($originalSTime)));
                        $now = $nowDiff ->format('%h');
                        if($now >0){
                            $sTime = $originalSTime;
                        }else{
                            $sTime = $startTime;
                        }
                        $time = date_diff(date_create($sTime),date_create($finish));
                        $showSubmit = $res['submittables'];
                        if($showSubmit==1){
                            $submission="None";
                        }else{
                            $submission="";
                        }

                        $dur = $time ->format('%a Days and %h hours');
                        echo "<div style=display:block;><form method=\"POST\">".$title."<br>
                            <span style=\"color:var(--primary-color);\"><strong>Task was set on:&nbsp;&nbsp;&nbsp;</strong></span>".$begin."<br>
                            <span style=\"color:var(--primary-color);\"><strong>You should be done by...:&nbsp;&nbsp;&nbsp;</strong></span>".$finish."<br>
                            <span style=\"color:var(--primary-color);\"><strong>Time left:&nbsp;&nbsp;&nbsp;</strong></span>".$dur."<br>
                            <span style=\"color:var(--primary-color);\"><strong>Description:&nbsp;&nbsp;&nbsp;</strong></span>".$description."<br>
                            <span style=\"color:var(--primary-color);\"><strong>Submittables:&nbsp;&nbsp;&nbsp;</strong></span>".$submission."<br>
                            <input style=\"background-color: green; margin-right:20px;\" type=\"submit\" formaction=\"completeTask.php?id='".$taskID."'\" name=\"completeTask\" value=\"Complete\" class=\"b1 signupbtn\"> 
                            </form>
                            </div>";
                    }else{
                        header("location: ../profile.php");
                        exit();
                    }
                    // var_dump($res['taskTitle']); var_dump($res['taskDescription']); die();
                    
                }else{
                    header("location: ../index.php");
                    exit();
                }
            ?>
        </div>
    </div>
</div>