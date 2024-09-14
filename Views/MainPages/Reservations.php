<?php
$title="Lodge Reservations Page";
$repRoot="../../";

require_once "../templates/_header.php";
?>

    <link rel="stylesheet" href="../Assets/css/ReservationsStylesheet.css">
<?php
require_once "../templates/_navbar.php";
if (isset($_SESSION["regError"])) {
    regCheck();
}
?>
<div id="flex">
    <div id="calendar">
        <div id="left">
            
        </div>
        <ul class="weekdays">
            <li>Mon</li>
            <li>Tue</li>
            <li>Wed</li>
            <li>Thu</li>
            <li>Fri</li>
            <li>Sat</li>
            <li>Sun</li>
        </ul>
        <ul class="days">

        </ul>
    </div>
</div>


<?php

require_once "../templates/_footer.php";
if (isset($_SESSION["submit"])) {
    $res = new Reservation();
    $res ->newRes($_POST["guests"],$_POST["startDate"],$_POST["endDate"],$_POST["roomId"],$_SESSION["customer"]->getCustomerId());
    header("location: ReserveSummary.php");
}
