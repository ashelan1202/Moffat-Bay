<?php
include "CustomerQuery.php";
class Customer
{
    private $email;
    private $customerID;
    private $name;
    private $creation;

    public function login($email, $password): array
    {
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
    public function checkEmail($email): bool{
        //Pattern from https://support.boldsign.com/kb/article/15962/how-to-create-regular-expressions-regex-for-email-address-validation#:~:text=Basic%20email%20validation%20regex%20pattern,-Here%20is%20a&text=One%20or%20more%20characters%20that,signs%20(%2B)%2C%20or%20hyphens%20(%2D).&text=The%20at%20symbol%2C%20which%20is%20required%20in%20all%20valid%20email%20addresses.&text=Z0%2D9%2D%5D%2B-,One%20or%20more%20characters%20that%20can%20be%20letters%20(a%2Dz%2C%20A%2DZ,9)%2C%20or%20hyphens%20(%2D).
        if(preg_match( '^[a-zA-Z0-9_.±]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$^',$email)){
            return true;
    } else{return false;}
    }
    public function checkPassword($password): array
    {
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
    public function register($email, $password, $name, $address, $city,$zipcode, $state): array
    {
        if($this->checkEmail($email)) {
            $check = $this->checkPassword($password);
            if ($check[0]) {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $customerQuery = new CustomerQuery();
                $registered = $customerQuery->register($email, $passwordHash, $name, $address, $city, $zipcode, $state);
                if ($registered[0]) {
                    $this->login($email, $password);
                    return [true, "Login Successful"];
                } else {
                    return [false, "$registered[1]"];
                }
            } else {
                return $check;
            }
        } else{ return [false, "Invalid Email"];}
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


