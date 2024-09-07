<?php
require_once "../models/CustomerInfo/Customer.php";
session_start();

if(isset($_POST['submit'])) {
    $_SESSION["customer"] = new Customer();
    if ($_POST['submit'] == "signin") {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $loggedIn = $_SESSION["customer"]->login($email, $password);
        if (!$loggedIn[0]) {
            session_unset();
            $_SESSION["loginError"] = $loggedIn[1];
            header('Location: ../Views/MainPages/LoginRegis.php' );
            exit;
        } else{
            header('Location: ../Views/TestPages/VerificationTest.php' );
        }
    } elseif ($_POST['submit'] == "signup") {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $register = $_SESSION["customer"]->register($email, $password, $name);
        if (!$register[0]) {
            $_SESSION["regError"] = $register[1];
            unset($_SESSION["customer"]);
            header('Location: ../Views/MainPages/LoginRegis.php' );
        } else{
            header('Location: ../Views/TestPages/VerificationTest.php' );
        }

    }
}