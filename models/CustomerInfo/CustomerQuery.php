<!--Ashley Landin, Samuel Segars, Rogelio Orozco, CSD460 Capstone in Software Development, 09-15-24-->
<?php
class CustomerQuery{
    private $username;
    private $password;
    private $host;
    private $database;
    public function __construct(){
        $this->username = "root";
        $this->password = "root";
        $this->host = "127.0.0.1";
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
    public function register($email, $password, $name): array
    {
        try{
            $conn = new mysqli($this->host, $this->username, $this->password, $this->database);
            $sql = "SELECT email from customer WHERE email = '$email'";
            $result = $conn->query($sql);
            if(mysqli_num_rows($result) == 0) {
                $sql = "INSERT INTO customer (email, password, name, creation) 
                    VALUES ('$email', '$password', '$name', now())";
                return [true, $conn->query($sql)];
            } else{
                return [false, "Email already exists"];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [false,"Error while registering"];
        }

    }

}


