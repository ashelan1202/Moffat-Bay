<?php
$repRoot = "../../";
include "Reservation.php";
require_once "{$repRoot}Views/templates/_header.php";
require_once "{$repRoot}Views/templates/_navbar.php";

$_SESSION["res"] = new Reservation();
$_SESSION["res"]->lookup(1,"test@test.com");
//header("location:".views."/MainPages/ReserveSummary.php");
?>
<table>
    <tr>
        <th>ID</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Room Size</th>
        <th>Name</th>
        <th>Guests</th>
        <th>Creation</th>
    </tr>
    <tr>
        <td><?php echo $_SESSION["res"]->getId()?></td>
        <td><?php echo $_SESSION["res"]->getStartDate()?></td>
        <td><?php echo $_SESSION["res"]->getEndDate()?></td>
        <td><?php echo $_SESSION["res"]->getRoomSize()?></td>
        <td><?php echo $_SESSION["res"]->getCustName()?></td>
        <td><?php echo $_SESSION["res"]->getGuests()?></td>
        <td><?php echo $_SESSION["res"]->getCreation()?></td>
    </tr>
</table>
<br>
<hr>
<form method="post">
<input type="date" name="startDate">
<input type="date" name="endDate">
<input type="submit" name="submitInsert">
</form>

<?php
if(isset($_POST["submitInsert"])) {
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];
    $newRes = new Reservation();
    $newRes ->newRes(3, $startDate, $endDate, 1, 2);
    ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Room Size</th>
            <th>Name</th>
            <th>Guests</th>
            <th>Creation</th>
        </tr>
        <tr>
            <td><?php echo $newRes->getId()?></td>
            <td><?php echo $newRes->getStartDate()?></td>
            <td><?php echo $newRes->getEndDate()?></td>
            <td><?php echo $newRes->getRoomSize()?></td>
            <td><?php echo $newRes->getCustName()?></td>
            <td><?php echo $newRes->getGuests()?></td>
            <td><?php echo $newRes->getCreation()?></td>
        </tr>
    </table>
        <?php
    unset($_POST["startDate"], $_POST["endDate"], $_POST["submit"]);
    //header('Location: resTest.php ' );
}
?>
<?php
require_once "{$repRoot}Views/templates/_footer.php";