<?php
    include_once 'header.php';
    if(!isset($_SESSION["userId"])){
        header("location: ../index.php");
        exit();
    }
?>

<html>
    <!-- <div id="overlay">
        <img src="/imgs//IMG-20221010-WA0003.jpg" alt="Loading" />
        Loading...
    </div>
    <script type="text/javascript">
        $(window).load(function(){
            // PAGE IS FULLY LOADED  
            // FADE OUT YOUR OVERLAYING DIV
            $('#overlay').fadeOut();
        });
    </script> -->
    <div id="mySidenav" class="sidenav">
        <div class="topclosebtn"></div>
        <a href="profile.php"><i style="padding-left: 5px;" class="fa-solid fa-user"></i></i>Profile</a>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i style="padding-left: 5px;"class="fa-solid fa-arrow-left"></i>My Dashboard</a>
        <a href="newTasks.php">New Task<i style="padding-left: 5px;" class="fa-solid fa-forward"></i></a>
        <a href="#">Work with Teams<i style="padding-left: 5px;" class="fa-solid fa-people-group"></i></a>
        <a href="health.php">Healthy Habits<i style="padding-left: 5px;" class="fa-regular fa-heart"></i></a>
        <a href="help.php">Help<i style="padding-left: 5px;" class="fa-solid fa-circle-info"></i></a>
        <a href="/includes/logout.inc.php" onclick="verifyLogout()">Log Out <i style="padding-left: 5px;" class="fa-regular fa-circle-xmark"></i></a> 
    </div>
    <!-- To open the sidenav -->
    <div class="menuNav" onclick="openNav()">
        <p><strong>Menu</strong><i class="fa-solid fa-arrow-right"></i></p>
    </div>
    <div class="mainPage">
        <?php

            require_once 'includes/dbh.inc.php';

            $conn;
            $sql = "SELECT * FROM tasks WHERE userId = $userId;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            
            $sqlb = "SELECT * FROM complete WHERE userId = $userId;";
            $resultb = mysqli_query($conn, $sqlb);
            $resultCheckb = mysqli_num_rows($resultb);


            if(($resultCheck + $resultCheckb)==0){
                $percentage =0;
            }else{
                $percentage =  floor(($resultCheckb/($resultCheck + $resultCheckb))*100);
            }
        ?>
        <div class="dashHText" style="display:flex;">
        <h1>My Dashboard</h1>
            <i id="myBtn" class="fa-solid fa-arrows-rotate mybtn" style="margin-top:25px; margin-left:5px; color:yellow; cursor:pointer;"></i>
            <div id="myModal" class="modal">       
            <div class="modal-content">
                <span class="closeModal">&times;</span>
                <p>Refresh/Clear your completed tasks. You can do this every so often
                 to give you a more up-to-date and true perspective in terms of your task completion progress.</p>
                 <a href="refresh.php"><input style="margin-right:20px;" type="submit" name="refreshCompletion" value="Refresh" class="signupbtn b1"></a>
            </div>
            </div>
        </div>
        <div class="dashBoard">
            <a href="profile.php"><div class="labelG">
                <h3 class="labelGT">My Tasks</h3>
                <div class="tasksGraph card">
                    <div class="circular-progress" style="background: conic-gradient(var(--primary-color) <?php echo $percentage * 3.6; ?>deg, var(--mainbackgroundcolor) 5deg);">
                    <div class="value-container"><?php echo $percentage; ?>%</div>
                </div>
                </div>
            </div></a>
            <div class="labelG">
                <h3 class="labelGT">Team Progress</h3>
                <div class="teamGraph card">
                    <div class="circular-progress" style="background: conic-gradient(var(--primary-color) <?php echo $percentage * 3.6; ?>deg, var(--mainbackgroundcolor) 5deg);">
                        <div class="value-container"><?php echo $percentage; ?>%</div>
                    </div>
                </div>
            </div>
            <a href="health.php"><div class="labelG">
                <h3 class="labelGT">Wellness</h3>
                <div class="wellBeing card">
                    <div class="circular-progress" style="background: conic-gradient(var(--primary-color) <?php echo $percentage * 3.6; ?>deg, var(--mainbackgroundcolor) 5deg);">
                        <div class="value-container"><?php echo $percentage; ?>%</div>
                    </div>
                </div>
            </div></a>
        </div>
    </div>
    
    <script src="/js/sidenav.js"></script>
    <script src="/js/modal.js"></script>

</html>