<?php
const Customer = "../../models/CustomerInfo/Customer.php";
require Customer;
$title = "Verification";
require_once "../templates/_header.php";
if(!isset($_SESSION['customer'])){
    header("location: CustomerTest.php");
}

?>
    <style>
        h1, input{
            text-align: center;
            margin: auto;
            width:50%
        }
        input{
            align-content: center;
            width:auto;
        }
        table, th, td{
            margin-left: auto;
            margin-right: auto;
            border: 1px solid;
            border-collapse: collapse;
        }
    </style>
    <?php require_once "../templates/_navbar.php" ?>
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
<a href="../../models/logout.php">Sign Out</a>
</body>
</html>