<?php
require_once '../header.php';

if(isset($_POST['editTask'])){
    $title = $_POST['taskTitle'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $taskDescription= $_POST['taskDescription'];
    $submittable = $_POST['submittable'];
    

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    if(timeError($startTime, $endTime) !== false){
        header("location: ../newTasks.php?error=task_durationError");
        exit();
    }
    if(emptyTaskFields($title, $startTime, $endTime)!== false){
        header("location: ../profile.php?error=emptyfieldssubmitted.");
        exit();
    }

    editTask($conn, $title, $startTime, $endTime, $taskDescription, $submittable, $userId);

}else{
    header("location: ../index.php");
    exit();
} 