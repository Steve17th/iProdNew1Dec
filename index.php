<?php
    include_once 'header.php';
?>
    <!-- Login section -->
    <section class="login-page">
        <div class="container grid">
            <div class="login-text">
                <h1>Seamless Productivity</h1>
                <p>Upgrade your productivity using tested, effective and easy to enforce techniques with the click of a button. Make an account on the iProductive Planner Platform and change how you work today, for the better! </p>
                <a href="features.php" class="btn btn-outline">Read More</a>
            </div>
            <div class="login-card cardEnt">
                <h2>Login In</h2>
                <form action='includes/login.inc.php' method="post">
                        <div class="login-form">
                            <input type="text" name="name" placeholder="User Name"required>
                        </div>
                        <div class="login-form">
                            <input type="text" name="email" placeholder="Email" required>
                        </div>
                        <div class="login-form">
                            <input type="password" name="password" placeholder="Password"required>
                        </div>
                        <input type="submit" name="submit" value="Login" class="btn">
                    </form>
                 <h5 class="newAccount"><a href="signup.php">Create New Account &nbsp;&nbsp;&nbsp;|</a><a href="resetpwd.php">|&nbsp;&nbsp;&nbsp; Forgot password?</a></h5>
            </div>
            <div class="errormsg">
            <?php
                if(isset($_GET["error"])){
                    if($_GET['error']== "emptyinput"){
                        echo"<p style=\"color:red;\"><strong>Fill in all the fields...</strong></p>";
                    }else if($_GET['error']=="account_not_indexed"){
                        echo"<p style=\"color:red;\"><strong>Hmm... Those credentials seem new. Are you already signed up?...</strong></p>";
                    }else if($_GET['error']=="wronglogin"){
                        echo"<p style=\"color:red;\"><strong>Incorrect login information...</strong></p>";
                    }
                }
            ?>
            </div>
        </div>
    </section>
