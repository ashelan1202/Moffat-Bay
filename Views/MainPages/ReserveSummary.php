<?php
$title="Lodge Reservation Summary Page";
$repRoot="../../";

require_once "../templates/_header.php";
?>

    <link rel="stylesheet" href="../Assets/css/ReserveSummaryStylesheet.css">
<?php
require_once "../templates/_navbar.php";
if (isset($_SESSION["regError"])) {
    regCheck();
}
?>

<div id="sum">
    <h2>Your Reservation has been Confirmed!</h2>
    <h4>Reservation Summary:</h4>
    <ul>
        <li>Confirmation Number:</li>
        <li>Name:</li>
        <li>Lodge:</li>
        <li>Number of Guests:</li>
        <li>Dates Reserved:</li>
    </ul>
    <div id="flex">
        <form method="post" action="Landing.php">
            <button type="submit" class="submit" name="submit" value="home">Home</button>
        </form>
        <form method="post" action="LoginRegis.php">
            <button type="submit" class="submit" name="submit" value="login">Login</button>
        </form>
        <form method="post" action="[insert name of about us page here]">
            <button type="submit" class="submit" name="submit" value="aboutus">About/Contact</button>
        </form>
    </div>
</div>
<?php
require_once "../templates/_footer.php";
