<!--Ashley Landin, Samuel Segars, Rogelio Orozco, CSD460 Capstone in Software Development, 09-15-24-->
<?php

class ReservationQuery
{
    private $username;
    private $password;
    private $host;
    private $database;
    private $conn;

    public function __construct()
    {
        $this->username = "root";
        $this->password = "root";
        $this->host = "localhost";
        $this->database = "moffatbay";
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
    }

    public function resInsert($customerId, $guests, $roomId, $startDate, $endDate){
        try{
        $sql = "INSERT INTO reservation (customerId, guests, roomId, startDate, endDate, creation, totalPrice)".
                        "VALUES ($customerId, $guests, $roomId,'$startDate', '$endDate', NOW(), (DATEDIFF('$endDate','$startDate') * (SELECT price from rooms where roomId = '$roomId')))";
        $this->conn->query($sql);
        $id = $this->conn->insert_id;
        $sql = "SELECT email FROM customer WHERE customerId = '$customerId'";
        $result =$this->conn->query($sql);
        $row = $result->fetch_row();
        if($row) {
            echo $id;
            return [true, $id, $row[0]];
        } else {
            return [false, "Error while booking reservation"];
        }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


    public function resLookup($reservationID, $email):array
    {
        try {
            $sql = "select ro.roomSize, c.name, re.guests, re.startDate, re.endDate, re.creation from reservation re" .
                                                                                          " join moffatbay.customer c on c.customerID = re.customerID" .
                                                                                          " join moffatbay.rooms ro on ro.roomId = re.roomId".
                                                                                          " where ReservationID = $reservationID and c.email = '$email'";

            $result = $this->conn->query($sql);
            $result = $result->fetch_assoc();
            if (!$result) {
                return [false, "Invalid Reservation"];
            } else {
                return [true, $result];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [false];
        }

    }
    public function getPrices(){
        try{
            $sql = "SELECT roomId,roomSize, price from rooms";
            $result = $this->conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [false];
        }

    }

}