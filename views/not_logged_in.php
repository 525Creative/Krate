<!-- errors & messages --->
<?php

// show negative messages
if ($login->errors) {
    foreach ($login->errors as $error) {
        echo $error;    
    }
}

// show positive messages
if ($login->messages) {
    foreach ($login->messages as $message) {
        echo $message;
    }
}

?>
<!-- errors & messages --->

<!-- login form box -->
<section class="not-logged-in">
    <form method="post" action="index.php" name="loginform">
        <label for="login_input_username">User Name</label>
        <input id="login_input_username" class="login_input" type="text" name="user_name" required />
        
        <label for="llogin_input_password">Password</label>
        <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required />
        
        <input type="submit"  name="login" value="Log in" />
    </form>

    <a class="register-link" href="register.php">Register new account</a>    
</section><!-- /not-logged-in -->
