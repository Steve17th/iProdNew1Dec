<?php
    include_once 'header.php'; 
?>

<section>
<div class="signup cardEnt">
     <h2>Create Account </h2>
        <form action='/includes/signup.inc.php' method="POST">
            <div class="login-form">
                <input type="text" name="name" placeholder="User Name"required>
            </div>
            <div class="login-form">
                <input type="text" name="email" placeholder="Email" required>
            </div>
            <div class="login-form">
                <input type="password" name="password" placeholder="Password"required>
            </div>
            <div class="login-form">
                <input type="password" name="repeatpassword" placeholder="Confirm Password"required>
            </div>
            <input type="submit" name="submit" value="Create Account" class="btn signupbtn">
        </form>
    <div class="errormsg">
    <?php
        if(isset($_GET["error"])){
            if($_GET['error']== "emptyinput"){
                echo"<p style=\"color:red;\"><strong>Fill in all the fields...</strong></p>";
            }else if($_GET['error']=="invalidEmail"){
                echo"<p style=\"color:red;\"><strong>Enter a valid email address...</strong></p>";
            }else if($_GET['error']=="password_mismatch"){
                echo"<p style=\"color:red;\"><strong>Entered passwords do not match!</strong></p>";
            }else if($_GET['error']=="email_exists"){
                echo"<p style=\"color:red;\"><strong>That email is already being used by another user!</strong></p>";
            }else if($_GET['error']=="password_is_too_short"){
                echo"<p style=\"color:red;\"><strong>That password is a bit too short... Try another.</strong></p>";
            }else if($_GET['error']=="stmtfailed"){
                echo"<p style=\"color:red;\"><strong>Oops! Something went wrong, wait a minute and try again🙂</strong></p>";
            }else if($_GET['error']=="none"){
                echo"<p style=\"color:aqua;\">Welcome! You have successfully signed up! You can now proceed to log in</p>";
            }
        }
    ?>
    </div>
    
</div>
</section>