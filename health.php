<?php
    include_once 'header.php';
    require_once 'includes/dbh.inc.php';

    if(!isset($_SESSION["userId"])){
        header("location: ../index.php");
        exit();
    }

    $conn;
    $sql = "SELECT * FROM healthtrack WHERE userId = $userId;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
?>
<html>
<div class="contH">
    <div id="mySidenav" class="sidenav">
        <div class="topclosebtn"></div>
        <a href="profile.php"><i style="padding-left: 5px;" class="fa-solid fa-user"></i></i>Profile</a>
        <a href="userHome.php"><i style="padding-left: 5px;"class="fa-solid fa-arrow-left"></i>My Dashboard</a>
        <a href="newTasks.php">New Task<i style="padding-left: 5px;" class="fa-solid fa-forward"></i></a>
        <a href="#">Work with Teams<i style="padding-left: 5px;" class="fa-solid fa-people-group"></i></a>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">Healthy Habits<i style="padding-left: 5px;" class="fa-regular fa-heart"></i></a>
        <a href="help.php">Help<i style="padding-left: 5px;" class="fa-solid fa-circle-info"></i></a>
        <a href="/includes/logout.inc.php" onclick="verifyLogout()">Log Out <i style="padding-left: 5px;" class="fa-regular fa-circle-xmark"></i></a> 
    </div>
    <div id="menuNav" class="menuNav" onclick="openNav()">
        <p><strong>Menu</strong><i class="fa-solid fa-arrow-right"></i></p>
    </div>
    <div class="mainPage">
    <?php
            if($resultCheck > 0){
                
            }else{
              echo "<div class=\"dropdown\"><h2 class =\"dropbtn btn btn-outline <link rel=\"stylesheet\" href=\"/css/utilities.css\"> <link rel=\"stylesheet\" href=\"/css/styles.css\">Welcome... Click to start <i class=\"fa-solid fa-circle-chevron-down\"></i></h2> 
                     <div class=\"dropdown-content\">
                        <a href=\"#\">Drink water</a>
                        <a href=\"#\">Meal log & Planner</a>
                        <a href=\"#\">Physical activity</a>
                        <a href=\"#\">Add new...</a>
                    </div></div>";
            }
    ?>
    </div>
    
</div>
<script src="/js/sidenav.js"></script>
</html>
