<?php
session_start();
if($_SESSION['test']) {
    session_destroy();
    header('location: ../Views/TestPages/CustomerTest.php');
} else{
    session_destroy();
    header('location: ../Views/LandingPage.php');
}