<?php
    include_once 'header.php';
    include_once './includes/dbh.inc.php';
    $id = $_GET['id'];

    if(isset($_GET['id'])){
        $query = mysqli_query($conn, "select * from tasks where taskId = $id");
        $res = mysqli_fetch_array($query);
    }else{
        header("location: ../profile.php");
        exit();
    }

    // var_dump($res['taskTitle']); var_dump($res['taskDescription']); die();

?>
    <div>
    <div style="display:flex; color:var(--primary-color); font-weight:1000; justify-content:center; align-items:center;"><h2>Edit Task</h2></div>
    <?php
    if(isset($_SESSION["userId"])){
    echo "<a href=\"profile.php\"><div style=\"\" class=\"menuNav\">
    <p><strong>Back</strong><i class=\"fa-solid fa-arrow-left\"></i></p>
    </div></a>";
    }else{
        echo"";
    }
    ?>
        <div style="color:#fff;" class="viewT">
            <?php
                if(isset($_SESSION["userId"])){
                    $id = $_GET['id'];

                   if(isset($_GET['id'])){
                    $query = mysqli_query($conn, "select * from tasks where taskId = $id");

                    $res = mysqli_fetch_array($query);
                    $title= $res['taskTitle'];
                    $taskID = $res['taskId'];
                    $description = $res['taskDescription'];
                    $begin = $res['startTime'];
                    $finish = $res['endTime'];

                    $startTime = date("Y-m-d H:i:s");
                    $originalSTime = $res['startTime'];

                    $nowDiff =(date_diff(date_create($startTime),date_create($originalSTime)));
                    $now = $nowDiff ->format('%h');
                    if($now >0){
                        $sTime = $originalSTime;
                    }else{
                        $sTime = $startTime;
                    }
                    $time = date_diff(date_create($sTime),date_create($finish));
                    $showSubmit = $res['submittables'];
                    if($showSubmit==true){
                        $submission="None";
                    }else{
                        $submission="";
                    }

                    $dur = $time ->format('%a Days and %h hours');
                    echo "<div style=display:block;><span id=\"smallTitle\" style=\"display:none;\"><strong><i>Task:</i></strong></span>".$title."<br>
                        <span style=\"color:var(--primary-color);\"><strong>Task was set on:&nbsp;&nbsp;&nbsp;</strong></span>".$begin."<br>
                        <span style=\"color:var(--primary-color);\"><strong>You should be done by...:&nbsp;&nbsp;&nbsp;</strong></span>".$finish."<br>
                        <span style=\"color:var(--primary-color);\"><strong>Time left:&nbsp;&nbsp;&nbsp;</strong></span>".$dur."<br>
                        <span style=\"color:var(--primary-color); \"><strong>Description:&nbsp;&nbsp;&nbsp;</strong></span><span style=\"display: inline-block; width: 170px; word-wrap: break-word;\">".$description."</span><br>
                        <span style=\"color:var(--primary-color);\"><strong>Submittables:&nbsp;&nbsp;&nbsp;</strong></span>".$submission."<br>
                        <input type=\"button\" name=\"showEdit\" id =\"hideBtn\" value=\"Proceed to edit\" onclick=\"showEdit()\" class=\"btn signupbtn\" />
                        </div>";
                   }else{
                    header("location: ../profile.php");
                    exit();
                   }
                    // var_dump($res['taskTitle']); var_dump($res['taskDescription']); die();
                    
                }else{
                    header("location: ../index.php");
                    exit();
                } 
                ?>
        <div id ="mainPage" style="display: none;" class="profileTasks editT cardEnt">
            <h2>Edit Prompt</h2> 
                <div id="myBtn5" class="myBtn5"><i style="box-shadow: 0 3px 10px rgba(255, 199, 51, 0.6); cursor:pointer;" class="fa-solid fa-triangle-exclamation"></i></div>
                        <div id="myModal5" class="modal5">       
                        <div class="modal-content5">
                            <span class="closeModal5">&times;</span>
                            <p>As you edit this task, remember to enter values that you want to remain the same as you edit those that will change.</p>
                        </div>
                        </div>  
            <form action='/includes/edit.inc.php' method="POST">
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
                <input type="submit" name="editTask" value="Edit Task" class="btn signupbtn">
            </form>
        </div>
        <script src="/js/showEdit.js"></script>
        <script src="/js/editmodal.js"></script>
    </div>