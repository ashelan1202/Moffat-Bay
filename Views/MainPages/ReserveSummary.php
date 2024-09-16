<!--Ashley Landin, Samuel Segars, Rogelio Orozco, CSD460 Capstone in Software Development, 09-15-24-->

<?php
$title="Lodge Reservation Summary Page";
$repRoot="../../";
include($repRoot."models/Reservation/Reservation.php");
require_once "../templates/_header.php";

?>

    <link rel="stylesheet" href="../Assets/css/ReserveSummaryStylesheet.css">
<?php
require_once "../templates/_navbar.php";
if(!isset($_SESSION["res"])){
    header("location:Landing.php");
}
?>

<div id="sum">
    <h2>Your Reservation has been Confirmed!</h2>
    <h4>Reservation Summary:</h4>
    <div style="display: inline-block; text-align: center;">
        <ul>
            <li>Confirmation Number: <?php echo $_SESSION["res"]->getId();?></li>
            <li>Name: <?php echo $_SESSION["res"]->getCustName();?></li>
            <li>Lodge: <?php echo $_SESSION["res"]->getRoomSize();?></li>
            <li>Number of Guests: <?php echo $_SESSION["res"]->getGuests();?></li>
            <li>Dates Reserved: <?php echo $_SESSION["res"]->getStartDate(). " to ". $_SESSION["res"]->getEndDate(); ?></li>
            <li>Creation: <?php echo $_SESSION["res"]->getCreation();?></li>
        </ul>
    </div>
    <div id="flex">
        <form method="post" action="Landing.php">
            <button type="submit" class="submit" name="submit" value="home">Home</button>
        </form>
        <form method="post" action="[insert name of about us page here]">
            <button type="submit" class="submit" name="submit" value="aboutus">About/Contact</button>
        </form>
    </div>
</div>
<?php
require_once "../templates/_footer.php";
