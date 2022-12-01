<?php
    include_once 'header.php';
?>
    <!-- Features -->
    <?php
    if(isset($_SESSION["userId"])){
    echo "<a href=\"userHome.php\"><div style=\"\" class=\"menuNav\">
    <p><strong>Back</strong><i class=\"fa-solid fa-arrow-left\"></i></p>
    </div></a>";
    }else{
        echo"";
    }
    ?>
    <section class="features">
        <div class="container grid">
            <div style="margin-top: 25px;"class="login-text features flex-features">
                <h1>Features</h1>
                <p>iProductive Planner is a tool to help you manage your time more effectively, monitor your daily habits and work on those that need your attention, work with and manage team tasks more efficiently and up your productivity as a whole.</p>
                <div class="featureCards es1">
                    <div  id="myBtn1" class="minicards m1 myBtn1">
                        <p><i class="fa-solid fa-people-group fa-2xl"></i>Work with teams</p>
                    </div>
                        <div id="myModal1" class="modal1">       
                        <div class="modal-content1">
                            <span class="closeModal1">&times;</span>
                            <p>Create a team by sending out invites via email to your team members; this will allow them to join your team where you can assign tasks, monitor their progress and receive submissions, right from your screen.</p>
                        </div>
                        </div>
                    <div id="myBtn2" class="minicards m1 myBtn2">
                       <p><i class="fa-regular fa-calendar fa-2xl"></i>Stay on top of your daily routines</p>
                    </div>
                        <div id="myModal2" class="modal2">       
                        <div class="modal-content2">
                            <span class="closeModal2">&times;</span>
                            <p>Stay up to date with your daily activities. Feeling overwhelmed by a busy day? Worry not, set reminders and focus on the tasks at hand, our system will notify you when it's time to tend to your daily activities.</p>
                        </div>
                        </div>
                    <div id="myBtn3" class="minicards m1 myBtn3">
                        <p><i class="fa-regular fa-clock fa-2xl"></i>Meet those deadlines</p>
                    </div>
                        <div id="myModal3" class="modal3">       
                        <div class="modal-content3">
                            <span class="closeModal3">&times;</span>
                            <p>Don't get ambushed by creeping deadlines. iProductive keeps track of your progress for you and notifies you on tasks that need attention. Plan ahead by setting them up on iProductive and stay ahead of the pack.</p>
                        </div>
                        </div>
                    <div id="myBtn4" class="minicards m1 myBtn4">
                        <p><i class="fa-regular fa-heart fa-2xl"></i>Monitor your well being</p>
                    </div>
                        <div id="myModal4" class="modal4">       
                        <div class="modal-content4">
                            <span class="closeModal4">&times;</span>
                            <p>Keep track of daily, healthy habits such as drinking water, going for a daily walk or jog, schedule reminders if you are on medication and many other important activities that you need to keep track of to stay as healthy as you can be.</p>
                        </div>
                        </div>
                </div>
            </div>
            <div class="clock"></div>
        </div>
        <script src="/js/featModal1.js"></script>
        <script src="/js/featModal2.js"></script>
        <script src="/js/featModal3.js"></script>
        <script src="/js/featModal4.js"></script>
    </section>