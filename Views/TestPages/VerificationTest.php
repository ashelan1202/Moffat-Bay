<?php
const Customer = "../../models/CustomerInfo/Customer.php";
require Customer;
$title = "Verification";
$repRoot = "../../";
require_once "../templates/_header.php";

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
        #logout{
            text-align: center;
        }
    </style>
    <?php
require_once "../templates/_navbar.php";

if(!isset($_SESSION['customer'])){
    header("location: {$views}MainPages/LoginRegis.php");
}?>
<h1>Test Page Verification</h1>

    <table>

        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Creation</th>
            <th>Customer ID</th>
        </tr>
        <tr>
            <td><?php echo $_SESSION["customer"]->getName()?></td>
            <td><?php echo $_SESSION["customer"]->getEmail()?></td>
            <td><?php echo $_SESSION["customer"]->getCreation()?></td>
            <td><?php echo $_SESSION["customer"]->getCustomerID()?></td>
        </tr>
    </table>
    <div id="logout"><a href="<?php echo controller?>logout.php"><button>Sign Out</button></a></div>
<?php
require_once "../templates/_footer.php";