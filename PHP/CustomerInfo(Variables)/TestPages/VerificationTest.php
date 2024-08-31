<?php
include "../Customer.php";
session_start();
if(!isset($_SESSION['customerId'])){
    header("location: CustomerTest.php");
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Samuel Table 2!</title>
    <style>
        body{
            text-align: center;
            margin: auto;
            width:50%
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
<h1>Test Page Verification</h1>

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
<input type="button" value="Logout" onclick="<?php session_destroy();?> document.location.href='CustomerTest.php'">
</body>
</html>