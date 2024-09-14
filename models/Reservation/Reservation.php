<?php
include "ReservationQuery.php";
class Reservation
{
    private $id;
    private $startDate;
    private $endDate;
    private $roomSize;
    private $custName;
    private $guests;
    private $creation;

    public function lookup($resId, $email): array
    {
        $resQuery = new ReservationQuery();
        $lookup = $resQuery ->resLookup($resId, $email);
        if(!$lookup[0]) {
            return[false,$lookup[1]];
        } else{
            $results = $lookup[1];
            $this->id = $resId;
            $this->startDate = $results["startDate"];
            $this->endDate = $results["endDate"];
            $this->roomSize = $results["roomSize"];
            $this->custName = $results["name"];
            $this->guests = $results["guests"];
            $this->creation = $results["creation"];
            return [true, "Reservation Lookup Success"];
        }
    }
    public function newRes($guests, $startDate, $endDate, $roomId, $custId): array
    {
        $resQuery = new ReservationQuery();
        $result = $resQuery -> resInsert($custId, $guests, $roomId, $startDate, $endDate);
        if($result[0]) {
           return $this->lookup($result[1], $result[2]);
        } else{
            return [false, "Reservation Creation Failed"];
        }

    }
    public function getId(){
        return $this->id;
    }
    public function getStartDate(){
        return $this->startDate;
    }
    public function getEndDate(){
        return $this->endDate;
    }
    public function getRoomSize(){
        return $this->roomSize;
    }
    public function getCustName(){
        return $this->custName;
    }
    public function getGuests(){
        return $this->guests;
    }
    public function getCreation(){
        return $this->creation;
    }
}