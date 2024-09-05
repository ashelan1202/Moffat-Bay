<?php
$title="Login/Registration Page";
$repRoot="../../";
require_once "../templates/_header.php";
require_once "../templates/_navbar.php";
require_once "../templates/_footer.php";
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="LoginRegisStyleSheet.css">
</head>
<body>
<div class="signUp">
    <h2>Sign Up</h2>
    <h4>First time visitor? Create an account below to book with us!</h4>
    <form>
        <input type="text" id="name" name="name" value="Full Name"><br>
        <input type="text" id="email" name="email" value="Email Address"><br>
        <input type="text" id="password" name="password" value="Password"><br>
    </form>
    <h5>Password must contain:</h5>
    <ul>
        <li>minimum of 8 characters</li>
        <li>1 uppercase letter</li>
        <li>1 lowercase letter</li>
    </ul>
    <form>
        <input type="button" id="submit" name="submit" value="Submit"><br>
    </form>
</div>



<div class="logIn">
    <h2>Login</h2>
    <h4>Already have an account with us? Login below!</h4>
    <form>
        <input type="text" id="userEmail" name="userEmail" value="Email"><br>
        <input type="text" id="userPass" name="userPass" value="Password"><br>
        <input type="button" id="submit" name="submit" value="Submit"><br>
    </form>
    <h5>Forgot your password?</h5>
</div>



