
<?php
    include_once 'header.php';
    if(isset($_SESSION["userId"])){
        echo "
        <div id=\"mySidenav\" class=\"sidenav\">
        <div class=\"topclosebtn\"></div>
        <a href=\"profile.php\"><i style=\"padding-left: 5px;\" class=\"fa-solid fa-user\"></i></i>Profile</a>
        <a href=\"userHome.php\"><i style=\"padding-left: 5px;\"class=\"fa-solid fa-arrow-left\"></i>My Dashboard</a>
        <a href=\"newTasks.php\">New Task<i style=\"padding-left: 5px;\" class=\"fa-solid fa-forward\"></i></a>
        <a href=\"#\">Work with Teams<i style=\"padding-left: 5px;\" class=\"fa-solid fa-people-group\"></i></a>
        <a href=\"#\">Healthy Habits<i style=\"padding-left: 5px;\" class=\"fa-regular fa-heart\"></i></a>
        <a href=\"javascript:void(0)\" class=\"closebtn\" onclick=\"closeNav()\">Help<i style=\"padding-left: 5px;\" class=\"fa-solid fa-circle-info\"></i></a>
        <a href=\"/includes/logout.inc.php\" onclick=\"verifyLogout()\">Log Out <i style=\"padding-left: 5px;\" class=\"fa-regular fa-circle-xmark\"></i></a> 
    </div>
    <!-- To open the sidenav -->
    <div class=\"menuNav\" onclick=\"openNav()\">
        <p><strong>Menu</strong><i class=\"fa-solid fa-arrow-right\"></i></p>
    </div>";
    }
    else{
        echo"";
    }
?>    
    <!-- Help Page / Contact Us-->
    <div class="mainPage">
        <section class="help">
            <div class="help-prompt">
                <h1>Contact Us</h1>
                <p>Need help? &nbsp;  We've got you! Reach out to the Team by sending in your concern through the prompt below!</p><br>
                <p>And don't forget to send in your email as well, so our team can reach out with a solution ASAP!</p>
                <textarea id="txt" class="help-input"></textarea>
                <input type="submit" id="hlp" name="submit" value="SEND" class="btn helpbtn">
            </div>
        </section>
    </div>
</body>
<script defer src="/js/helptxt.js"></script>
<script src="/js/sidenav.js"></script>
</html>