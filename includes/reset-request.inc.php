<?php

if(isset($_POST["reset-request-submit"])){
    
    //Generate token and covert to hex for inserting into url link
    $selector = bin2hex(random_bytes(8));
    //Authenticate user
    $token = random_bytes(32);

    // $url = "www."

}else{
    header("location: ../index.php");
}