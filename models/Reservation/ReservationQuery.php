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
        $result = $this->conn->query($sql);
        if($result) {
            return [true, "Reservation Successfully Booked"];
        } else {
            return [false, "Error while booking reservation"];
        }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


    public function resLookup($reservationID, $email)
    {
        try {
            $sql = "select r.roomSize, c.name, reservation.guests, reservation.startDate, reservation.endDate from reservation" .
                                                                                          " join moffatbay.customer c on c.customerID = reservation.customerID" .
                                                                                          " join moffatbay.rooms r on r.roomId = reservation.roomId".
                                                                                          " where ReservationID = $reservationID and c.email = '$email'";

            $result = $this->conn->query($sql);
            $result = $result->fetch_all();
            if (!isset($result[0])) {
                return [false, "Invalid Login"];
            } else {
                return [true, $result];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}