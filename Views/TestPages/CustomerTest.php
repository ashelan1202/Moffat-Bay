<?php
const Customer = "../../models/CustomerInfo/Customer.php";
require Customer;
$title = "Customer Test";
$repRoot = "../../";
require_once "../templates/_header.php";
$_SESSION["test"] = true;

?>
    <style>
        form, h1{
            text-align: center;
            margin: auto;
        }
        .flex-container{
            text-align: center;
            width:50%;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin: auto auto 10px;
        }
        table, th, td {
            margin-left: auto;
            margin-right: auto;
            border: 1px solid;
            border-collapse: collapse;
        }
    </style>
<script>
    let reg = document.getElementById("reg");
    function regShow() {
        document.getElementById("reg").style.visibility= 'visible';
        document.getElementById("reg").style.height='auto';
    }
    function regHide(){
        document.getElementById("reg").style.visibility = 'hidden';
        document.getElementById("reg").style.height='0';
    }
</script>
<?php require_once "../templates/_navbar.php" ?>
<h1>Test Page Login/ Register</h1>
<form name="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <div class="flex-container">
        <div class="flex-child"><label>Login<input type="radio" name="selection" value="login" onclick="regHide()" checked="checked"/></label></div>
        <div class="flex-child"><label>Register<input type="radio" name="selection" value="register" onclick="regShow()"/></label></div>
    </div>
        <p><label>Email:<input type="email" name="email" /></label></p>
        <p><label>Password:<input type="password" name="password" /></label></p>
    <div id="reg" style="height:0; visibility: hidden" >
        <p><label> Name:<input type="text" name="name" </label></p>
        <p><label>Address Line:<input type="text" name="addLine" </label></p>
        <p><label>City:<input type="text" name="city"</label></p>
        <p><label>Zipcode:<input type="text" name="zipcode"</label></p>
        <p><label>State:<input type="text" name="state" </label></p>
    </div>
    <input type="submit" name="submit"/>
</form>
<?php

if(isset($_REQUEST['submit'])) {
    $_SESSION["customer"] = new Customer();
    if ($_REQUEST['selection'] == "login") {
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $loggedIn = $_SESSION["customer"]->login($email, $password);
        if (!$loggedIn[0]) {
            session_unset();
            print($loggedIn[1]);
        } else{
            header("location: VerificationTest.php");
        }
    } elseif ($_REQUEST['selection'] == "register") {
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $name = $_REQUEST['name'];
        $addLine = $_REQUEST['addLine'];
        $city = $_REQUEST['city'];
        $zipcode = $_REQUEST['zipcode'];
        $state = $_REQUEST['state'];
        $register = $_SESSION["customer"]->register($email, $password, $name, $addLine, $city, $zipcode, $state);
        if (!$register[0]) {
            if (is_array($register[1])) {
                foreach ($register[1] as $error) {
                    print("$error <br>");
                }
            } else {
                print("$register[1]");
            }
            unset($_SESSION["customer"]);
        }

    }
}
require_once "../templates/_footer.php";