<?php

// Database handler
$serverName = "localhost";
$dBUserName = "root";
$dBPassword = "";
$dBName = "iProductiveDB";

// Connect to Database
$conn =  mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}