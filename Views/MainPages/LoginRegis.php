<!--Ashley Landin, Samuel Segars, Rogelio Orozco, CSD460 Capstone in Software Development, 09-15-24-->

<?php
$title="Login/Registration Page";
$repRoot="../../";

require_once "../templates/_header.php";
?>

    <link rel="stylesheet" href="../Assets/css/LoginRegisStyleSheet.css">
<?php
require_once "../templates/_navbar.php";
if (isset($_SESSION["regError"])) {
    regCheck();
}
?>

<div id="flex">
<div class="logIn">
    <h2>Login</h2>
    <h4>Already have an account with us? Login below!</h4>
    <p id="loginErrMsg"><?php if(isset($_SESSION["loginError"])){
        echo $_SESSION["loginError"];
        unset($_SESSION["loginError"]);
        }?></p>
    <form method="post" action="../../controller/login.php">
        <input type="email" id="email" name="email" placeholder="Email" required><br>
        <input type="password" id="password" name="password" placeholder="Password" required><br>
        <button type="submit" class="submit" name="submit" value="signin">Sign In</button><br>
    </form>
    <h5>Forgot your password?</h5>
    <h5><a href="registration.php">Register</a></h5>
</div>
</div>
<?php
require_once "../templates/_footer.php";




