<!--Ashley Landin, Samuel Segars, Rogelio Orozco, CSD460 Capstone in Software Development, 09-15-24-->
<?php
include "../models/CustomerInfo/Customer.php";
include "../models/Reservation/Reservation.php";
session_start();
$guests = $_POST["guests"];
$startDate = $_POST["startDate"];
$endDate = $_POST["endDate"];
$roomId = $_POST["lodgeId"];
$customerId = $_SESSION["customer"]->getCustomerId();
$_SESSION["res"] = new Reservation();
if($_SESSION["res"] ->newRes($guests, $startDate, $endDate, $roomId, $customerId)[0]){
    header("location: ../Views/MainPages/ReserveSummary.php");
} else{
    header("location: ../Views/MainPages/Reservations.php");
}