<?php
include "CustomerQuery.php";

function login($email, $password){
    $customerQuery = new CustomerQuery();
    $results = $customerQuery->login($email, $password);
    if($results[0]) {
        $_SESSION["name"] = $results[1][3];
        $_SESSION["email"] = $results[1][0];
        $_SESSION["customerId"] = $results[1][2];
        $_SESSION["creation"] = $results[1][4];
        return [true,"Login successful"];
    } else{
        return [false, $results[1]];
    }
}
function checkPassword($password){
    $passwordChecks = [preg_match(".[A-Z].", $password ), preg_match(".[a-z].", $password ), strlen($password) > 8];
    if($passwordChecks[0]and $passwordChecks[1] and $passwordChecks[2]){
        return [true, "Password check successful"];
    } else {
        $required = [];
        if (!$passwordChecks[0]) {
            $required[] = "Must contain at least one uppercase letter";
        }
        if (!$passwordChecks[1]) {
            $required[] = "Must contain at least one lowercase letter";
        }
        if (!$passwordChecks[2]) {
            $required[] = "Must contain at least 8 characters";
        }
        return [false, $required];
    }
}
function register($email, $password, $name, $address, $city,$zipcode, $state){
    $check = checkPassword($password);
    if($check[0]){
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $customerQuery = new CustomerQuery();
        $registered = $customerQuery->register($email, $passwordHash, $name, $address, $city, $zipcode, $state);
        if($registered[0]) {
            login($email, $password);
            return [true, "Login Successful"] ;
        } else{
            return [false, $registered[1]];
        }
    }else{
        return $check;
    }
}
function getAddress($customerID){
    $customerQuery = new CustomerQuery();
    return $customerQuery->getFullAddress($customerID)[1];
}



