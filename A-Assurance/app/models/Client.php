<?php
require("Database.php");

class Client extends Database {
    private $client_ID;
    private $name;
    private $CIN;
    private $address;
    private $number;
    private $isDeleted;

    public function __construct($client_ID, $name, $CIN, $address, $number, $isDeleted) {
        $this->client_ID = $client_ID;
        $this->name      = $name;
        $this->CIN       = $CIN;
        $this->address   = $address;
        $this->number    = $number;
        $this->isDeleted = $isDeleted;
    }

    #setter and getter

    public function setClient_ID($client_ID) {
        $this->client_ID = $client_ID;
    }

    public function getClient_ID() {
        return $this->client_ID;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setCIN($CIN) {
        $this->CIN = $CIN;
    }

    public function getCIN() {
        return $this->CIN;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setNumber($number) {
        $this->number = $number;
    }

    public function getNumber() {
        return $this->number;
    }
    
    public function setIsDeleted($isDeleted) {
        $this->isDeleted = $isDeleted;
    }

    public function getIsDeleted() {
        return $this->isDeleted;
    }
}

?>