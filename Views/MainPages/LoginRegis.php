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
    <div class="hidden"></div>
<div class="signUp">
    <h2>Sign Up</h2>
    <h4>First time visitor? Create an account below to book with us!</h4>
    <p id="regErrMsg"></p>
    <form method="post" action="../../controller/login.php">
        <input type="text" id="name" name="name" placeholder="Full Name"><br>
        <input type="email" id="email" name="email" placeholder="Email Address"><br>

    <h5>Password must contain:</h5>
    <ul id="passwordReq">
        <li id="length">Minimum of 8 characters</li>
        <li id="upper">1 Uppercase Letter</li>
        <li id="lower">1 Lowercase Letter</li>
    </ul>
        <input type="password" id="password" name="password" placeholder="Password"><br>
        <button type="submit" class="submit" name="submit" value="signup">Sign Up</button><br>
    </form>
    <p>By Signing up you agree to our terms and conditions</p>
</div>

<div class="hidden"></div>

<div class="logIn">
    <h2>Login</h2>
    <h4>Already have an account with us? Login below!</h4>
    <p id="loginErrMsg"><?php if(isset($_SESSION["loginError"])){
        echo $_SESSION["loginError"];
        unset($_SESSION["loginError"]);
        }?></p>
    <form method="post" action="../../controller/login.php">
        <input type="email" id="email" name="email" placeholder="Email"><br>
        <input type="password" id="password" name="password" placeholder="Password"><br>
        <button type="submit" class="submit" name="submit" value="signin">Sign In</button><br>
    </form>
    <h5>Forgot your password?</h5>
</div>
    <div class="hidden"></div>
</div>
<?php
require_once "../templates/_footer.php";

function regCheck()
{
    $regError = $_SESSION["regError"];
    if (is_array($regError)) {
        echo "<style>";
        foreach ($regError as $key => $value) {
            if (!$value) {
                if ($key == "upper") {
                    echo "#upper {color: red;}";
                } elseif ($key == "lower") {
                    echo "#lower {color: red;}";
                } elseif ($key == "length") {
                    echo "#length {color: red;}";
                }

            }
        }

        echo "</style>";
    } else {
        ?>
        <script>window.onload = function errMsg(){document.getElementById("regErrMsg").innerHTML = <?php print("\"$regError\""); ?>;}</script>
        <?php
    }
}


