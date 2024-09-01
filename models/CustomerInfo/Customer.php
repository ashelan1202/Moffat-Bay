<?php
include "CustomerQuery.php";
class Customer
{
    private $email;
    private $customerID;
    private $name;
    private $creation;

    public function login($email, $password){
        $customerQuery = new CustomerQuery();
        $results = $customerQuery->login($email, $password);
        if($results[0]) {
            $this->name = $results[1][3];
            $this->email = $results[1][0];
            $this->customerID = $results[1][2];
            $this-> creation = $results[1][4];
            return [true,"Login successful"];
        } else{
            return [false, $results[1]];
        }
    }
    public function checkPassword($password){
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
    public function register($email, $password, $name, $address, $city,$zipcode, $state){
        $check = $this->checkPassword($password);
        if($check[0]){
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $customerQuery = new CustomerQuery();
        $registered = $customerQuery->register($email, $passwordHash, $name, $address, $city, $zipcode, $state);
        if($registered[0]) {
            $this->login($email, $password);
            return [true, "Login Successful"] ;
        } else{
              return [false, "$registered[1]"];
            }
        }else{
            return $check;
        }
    }
        public function getEmail(){
        return $this->email;
        }
        public function getCustomerID(){
        return $this->customerID;
        }
        public function getName(){
        return $this->name;
        }
        public function getCreation(){
        return $this->creation;
        }
        public function getFullAddress(){
            $CustomerQuery = new CustomerQuery();
            return $CustomerQuery->getFullAddress($this->customerID)[1];

        }
    }


