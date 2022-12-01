<?php
require_once '../header.php';
if(isset($_POST['setTask'])){
    $title = $_POST['taskTitle'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $taskDescription= $_POST['taskDescription'];
    $submittable = $_POST['submittable'];
    

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyTaskFields($title, $startTime, $endTime)!== false){
        header("location: ../newTasks.php?error=notaskinformation");
        exit();
    }
    if(timeError($startTime, $endTime) !== false){
        header("location: ../newTasks.php?error=task_durationError");
        exit();
    }

    if(isset($_SESSION["userId"])){
        $userId= $_SESSION["userId"];
    }else{
        header("location: ../newTasks.php?error=nologininfo" .mysqli_error($conn));
        exit();
    }

    createTask($conn, $title, $startTime, $endTime, $taskDescription, $submittable, $userId, $totalTasks);
    // createTaskDup($conn,$name, $email, $title, $startTime, $endTime, $taskDescription, $submittable, $userId);

}else{
    header("location: ../index.php");
    exit();
} 