<?php
    include_once 'header.php'; 

    
?>

<section>
<div class="help-prompt">
    <h2>Reset your password</h2>
    <p>An email will be sent to you with instructions on how to reset your password.</p>
</div>
<div style="height: 300px;" class="signup cardEnt">
    <h2>Reset your password</h2>
    <p style="color: #fff;">But first, enter your email address below</p>
    <form action='/includes/reset-request.inc.php' method="POST">
            <div class="login-form">
                <input type="text" name="email" placeholder="Email Address..." required>
            </div>
            <input type="submit" name="reset-request-submit" value="Request Reset" class="btn signupbtn">
    </form>
    <div class="errormsg">
        
    </div>
    
</div>
</section>