<?php
include "../models/Reservation/Reservation.php";
session_start();
$resId = $_POST['resId'];
$email = $_POST['email'];
$_SESSION['res'] = (new Reservation);
if($_SESSION['res']->lookup($resId,$email)[0]){
    header("location:../Views/MainPages/ReserveSummary.php");
} else{
    $_SESSION['resLookupError'] = "Reservation Not Found";
    header("location:../Views/MainPages/ReservationLookup.php");
}