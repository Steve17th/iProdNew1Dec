<?php

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatpassword = $_POST['repeatpassword'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    // require_once '../PHPMailer/mailer.php';

    if(emptyInputSignUp($name, $email, $password, $repeatpassword)!== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if(invalidUserId($email)!== false){
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }
    if(pwdMatch($password, $repeatpassword)!== false){
        header("location: ../signup.php?error=password_mismatch");
        exit();
    }
    if(passwordStrength($password)!== false){
        header("location: ../signup.php?error=password_is_too_short");
        exit();
    }
    if(emailExists($conn, $name, $email )!== false){
        header("location: ../signup.php?error=email_exists");
        exit();
    }

    createUser($conn, $name, $email, $password);
    // sendSignUpMail();

}else{
    header("location: ../index.php");
    exit();
} 