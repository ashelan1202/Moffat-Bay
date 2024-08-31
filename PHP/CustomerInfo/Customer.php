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
        if($results) {
            $this->name = $results[0][3];
            $this->email = $results[0][0];
            $this->customerID = $results[0][2];
            $this-> creation = $results[0][4];
        } else{
            print("Error Logging in!");
        }
    }
    public function register($email, $password, $name, $address, $city,$zipcode, $state){
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $customerQuery = new CustomerQuery();
        $registered = $customerQuery->register($email, $passwordHash, $name, $address, $city, $zipcode, $state);
        if($registered) {
            $this->login($email, $password);
        } else{
            print("Error while registering!");
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
            return $CustomerQuery->getFullAddress($this->customerID);

        }
    }


