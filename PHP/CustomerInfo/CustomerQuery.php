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
                print("Invalid Login");
                return false;
            }else {
                if (password_verify($password, $result[0][1])) {
                    return $result;
                } else {
                    print("Invalid Login <br>");
                    return false;
                }
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $conn->close();
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
                return $conn->query($sql);
            } else{
                print("Email is already registered");
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        } finally {
            $conn->close();
        }

    }
            public function getFullAddress($customerID){
            try {
                $conn = new mysqli($this->host, $this->username, $this->password, $this->database);
                $sql = "SELECT address,city,state,zipcode FROM customer WHERE customerID = '$customerID'";
                $result = $conn->query($sql);
                $result = $result->fetch_all();
                if (isset($result[0])){
                    return $result[0];
                }
                return "Error";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false;
            } finally {
                $conn->close();
            }
    }

}
?>

