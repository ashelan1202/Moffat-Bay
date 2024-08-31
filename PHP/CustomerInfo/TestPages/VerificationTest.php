<?php
include "../Customer.php";
session_start();
if(!isset($_SESSION['customer'])){
    header("location: CustomerTest.php");
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Session Verification</title>
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
            <?php $address = $_SESSION["customer"]->getFullAddress();?>
            <td><?php echo $_SESSION["customer"]->getName()?></td>
            <td><?php echo $_SESSION["customer"]->getEmail()?></td>
            <td><?php echo $_SESSION["customer"]->getCreation()?></td>
            <td><?php echo $_SESSION["customer"]->getCustomerID()?></td>
            <td><?php echo "$address[0], $address[1], $address[2], $address[3]"?></td>
        </tr>
    </table>
<input type="button" value="Logout" onclick="<?php session_destroy();?> document.location.href='CustomerTest.php'">
</body>
</html>