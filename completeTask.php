<?php
    include_once 'header.php';
    include_once './includes/dbh.inc.php';
    require_once './includes/functions.inc.php';
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

                $query = mysqli_query($conn, "select * from tasks where taskId = $id");

                $res = mysqli_fetch_array($query);
                $title= $res['taskTitle'];
                $taskID = $res['taskId'];
                $description = $res['taskDescription'];
                $begin = $res['startTime'];
                $endTime = $res['endTime'];
                $submittable = $res['submittables'];
                $timeCompleted = date("Y-m-d H:i:s");
                $userId = $_SESSION["userId"];

                $timeT =(date_diff(date_create($begin),date_create($timeCompleted)));
                $timeTaken = $timeT ->format('%a Days %h hours');

                completeTask($conn, $taskID, $title, $userId, $timeCompleted, $timeTaken, $begin, $endTime, $description, $submittable );
                
                // $sql="INSERT INTO complete (taskId, taskTitle, startTime, endTime, taskDescription,  userId) VALUES ( $res[`taskId`], ?, ?, ?, ?);";   

                // $query = mysqli_query($conn, "insert into complete values tasks where taskId = $id");                
            }else{
                header("location: ../index.php");
                exit();
        }
        ?>
    </div>
</div>