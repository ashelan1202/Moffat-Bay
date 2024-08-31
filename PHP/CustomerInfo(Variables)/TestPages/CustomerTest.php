<?php
include "../Customer.php";
session_start();

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Customer Test</title>
    <style>
        body{
            text-align: center;
            margin: auto;
            width:50%
        }
        .flex-container{
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }
        table, th, td{
            margin-left: auto;
            margin-right: auto;
            border: 1px solid;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<h1>Test Page Login/ Register</h1>
<form name="form" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <div class="flex-container">
        <div class="flex-child"><label>Login<input type="radio" name="selection" value="login" onclick="document.getElementById('reg').style.visibility ='hidden'" checked="checked"/></label></div>
        <div class="flex-child"><label>Register<input type="radio" name="selection" value="register" onclick="document.getElementById('reg').style.visibility='visible'"/></label></div>
    </div>
        <label>Email<input type="text" name="email" /></label><br>
        <label>Password<input type="text" name="password" /></label>
    <div id="reg" style="visibility: hidden" >
        <label> Name:<input type="text" name="name" </label><br>
        <label>Address Line:<input type="text" name="addLine" </label><br>
        <label>City:<input type="text" name="city"</label><br>
        <label>Zipcode:<input type="text" name="zipcode"</label><br>
        <label>State:<input type="text" name="state" </label><br>
    </div>
    <input type="submit" name="submit"/>
</form>
<?php

if(isset($_REQUEST['submit'])) {
    if($_REQUEST['selection'] == "login") {
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $test = login($email, $password);
        if(!$test[0]){
            session_unset();
            print($test[1]);
        }
    } elseif ($_REQUEST['selection'] == "register") {
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $name = $_REQUEST['name'];
        $addLine = $_REQUEST['addLine'];
        $city = $_REQUEST['city'];
        $zipcode = $_REQUEST['zipcode'];
        $state = $_REQUEST['state'];
        $register = register($email, $password, $name, $addLine, $city, $zipcode, $state);
        if(!$register[0]){
            if(is_array($register[1])){
                foreach ($register[1] as $error){
                    print( "$error <br>") ;
                }
            } else{
                 print("$register[1]");
            }
        }

    }
if (isset($_SESSION["name"])){
?>
<table>

    <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Creation</th>
    <th>Customer ID</th>
    <th>Address</th>
    </tr>
    <tr>
        <?php $address = getAddress($_SESSION["customerId"]);?>
        <td><?php echo $_SESSION["name"]?></td>
        <td><?php echo $_SESSION["email"]?></td>
        <td><?php echo $_SESSION["creation"]?></td>
        <td><?php echo $_SESSION["customerId"]?></td>
        <td><?php echo "$address[0], $address[1], $address[2], $address[3]"?></td>
    </tr>
</table>
    <a href="VerificationTest.php">Link test</a>
<?php
    }
}
?>
</body>
</html>