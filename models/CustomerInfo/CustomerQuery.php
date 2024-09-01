<?php
class CustomerQuery{
    private $username;
    private $password;
    private $host;
    private $database;
    public function __construct(){
        $this->username = "root";
        $this->password = "root";
        $this->host = "localhost";
        $this->database = "moffatbay";
    }

    public function login($email, $password){
        try {
            $conn = new mysqli($this->host, $this->username, $this->password, $this->database);
            $sql = "SELECT email, password, customerID, name, creation FROM customer WHERE email = '$email'";
            $result = $conn->query($sql);
            $result = $result->fetch_all();
            if(!isset($result[0])){
                return [false, "Invalid Login"];
            }else {
                if (password_verify($password, $result[0][1])) {
                    return [true, $result[0]];
                } else {
                    return [false, "Invalid Login"];
                }
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function register($email, $password, $name, $address, $city,$zipcode, $state){
        try{
            $conn = new mysqli($this->host, $this->username, $this->password, $this->database);
            $sql = "SELECT email from customer WHERE email = '$email'";
            $result = $conn->query($sql);
            $result = $result->fetch_all();
            if(!$result) {
                $sql = "INSERT INTO customer (email, password, name, address, city, zipcode, state, creation) 
                    VALUES ('$email', '$password', '$name', '$address', '$city', '$zipcode', '$state', now())";
                return [true, $conn->query($sql)];
            } else{
                return [false, "Email already exists"];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [false,"Error while registering"];
        }

    }
            public function getFullAddress($customerID){
            try {
                $conn = new mysqli($this->host, $this->username, $this->password, $this->database);
                $sql = "SELECT address,city,state,zipcode FROM customer WHERE customerID = '$customerID'";
                $result = $conn->query($sql);
                $result = $result->fetch_all();
                if (isset($result[0])){
                    return [true,$result[0]];
                } else{
                    return [false,"Error getting full address"];
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return [false,"Error getting full address"];
            }
    }

}


