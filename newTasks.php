<?php
    require_once 'header.php';
    if(!isset($_SESSION["userId"])){
        header("location: ../index.php");
        exit();
    }
?>

<section>
<div class="menuNav" onclick="openDashboard()">
        <p><strong>Back</strong><i class="fa-solid fa-arrow-left"></i></p>
</div>
<div style="width:750px; height:780px; margin-bottom:15px;" class="newtask signup cardEnt">
     <h2>Create task </h2>
     <div class="errormsg">
            <?php
                if(isset($_GET["error"])){
                    if($_GET['error']== "notaskinformation"){
                        echo"<p style=\"color:red;\"><strong>Fill in all the fields...</strong></p>";
                    }else if($_GET['error']=="task_durationError"){
                        echo"<p style=\"color:red;\"><strong>The deadline cannot be before the starting date... </strong></p>";
                    }
                }
            ?>
        </div>
        <form action='/includes/setTask.inc.php' method="POST">
            <div class="login-form">
                <input type="text" name="taskTitle" placeholder="Title"required>
            </div>
            <div class="login-form">
                <label for="startTime">Start Time</label>
                <input style="background-color:#fff; font-family: Georgia, 'Times New Roman', Times, serif;" type="datetime-local" name="startTime" required>
                <label for="endTime">End Time</label>
                <input style="background-color:#fff; font-family: Georgia, 'Times New Roman', Times, serif;" type="datetime-local" name="endTime" required>
            </div>
            <div class="login-form">
                <textarea name="taskDescription" class="taskDescription help-input" placeholder="What is the task about?"></textarea>
            </div>
            <div class="login-form">
                <label class="switch">Do you want to add submittables for this task?</label>
                <input type="hidden" name="submittable" value="false" />
                <input name="submittable" type="checkbox" value="true">
                <div class="submitFile"><i class="fa-solid fa-circle-question"></i></div>
                <div class="hide1">As you work on your tasks, add submittable files where relevant to aid with your <b>own accountability</b>. 
                    Except for team submissions, files aren't stored on the server but are just shown to be part 
                    of a complete task and are discarded upon submission; therefore cannot be accessed later.
                </div>
                
                <!-- <span class="slider round"></span> -->
            </div>
            <input type="submit" name="setTask" value="Set Task" class="btn signupbtn">
        </form>
    <script src="/js/sidenav.js"></script>
</div>
</section>