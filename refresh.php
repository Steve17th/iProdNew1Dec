<?php
    include_once 'header.php';
    include_once './includes/dbh.inc.php';
    require_once './includes/functions.inc.php';

if(isset($_SESSION["userId"])){  
    $userId = $_SESSION["userId"];
    $query = mysqli_query($conn, "select * from complete where userId = $userId");
    $res = mysqli_fetch_array($query);
    $taskID = $res['taskId'];
    $num_of= mysqli_num_rows($query);

    if($num_of<1){
        echo '<script type="text/javascript"> alert("Refresh is Complete!");</script>';           
        header("location: ../profile.php");
        exit();
    }else{
        refreshComplete($conn, $userId, $taskID);   
        echo '<script type="text/javascript"> alert("Refresh is Complete!");</script>';           
        header("location: ../userHome.php");
        exit();
    }
}else{
    header("location: ../index.php");
    exit();
}
