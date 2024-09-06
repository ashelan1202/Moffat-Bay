<?php
$title="Login/Registration Page";
$repRoot="../../";
require_once "../templates/_header.php";

?>
    <link rel="stylesheet" href="../Assets/css/LoginRegisStyleSheet.css">
<?php
require_once "../templates/_navbar.php";
?>
<div id="flex">
    <div class="hidden"></div>
<div class="signUp">
    <h2>Sign Up</h2>
    <h4>First time visitor? Create an account below to book with us!</h4>

    <form method="post">
        <input type="text" id="name" name="name" placeholder="Full Name"><br>
        <input type="text" id="email" name="email" placeholder="Email Address"><br>

    <h5>Password must contain:</h5>
    <ul id="passwordReq">
        <li>Minimum of 8 characters</li>
        <li>1 Uppercase Letter</li>
        <li>1 Lowercase Letter</li>
    </ul>
        <input type="text" id="password" name="password" placeholder="Password"><br>
        <button type="submit" class="submit" name="submit" value="signup">Sign Up</button><br>
    </form>
    <p>By Signing up you agree to our terms and conditions</p>
</div>

<div class="hidden"></div>

<div class="logIn">
    <h2>Login</h2>
    <h4>Already have an account with us? Login below!</h4>
    <form method="post">
        <input type="email" id="userEmail" name="userEmail" placeholder="Email"><br>
        <input type="password" id="userPass" name="userPass" placeholder="Password"><br>
        <button type="submit" class="submit" name="submit" value="Sign In">Sign In</button><br>
    </form>
    <h5>Forgot your password?</h5>
</div>
    <div class="hidden"></div>
</div>
<?php
require_once "../templates/_footer.php";


