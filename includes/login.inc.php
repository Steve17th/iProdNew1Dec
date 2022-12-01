<?php

if (isset($_POST["submit"])){
 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($name, $email, $password)== true){
        header("location: ../index.php?error=emptyinput");
        exit();
    }
    
    loginUser($conn, $name, $email, $password);
}else{
    header("location: ../index.php");
    exit();
}