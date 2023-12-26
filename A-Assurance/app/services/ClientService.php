<?php

require_once("../models/Database.php");
require_once("IClientService.php");
require_once("../models/Client.php");

class ClientService extends Database implements IClientService {
    
    public function insert(Client $client) {

        $pdo = $this->connect();

        $client_ID = $client->getClient_ID();
        $name = $client->getName();
        $CIN = $client->getCIN();
        $address = $client->getAddress();
        $number = $client->getNumber();
        $isDeleted = $client->getIsDeleted();

        $sql = "INSERT INTO Client VALUES (:client_ID, :name, :CIN, :address, :number, :isDeleted )";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":client_ID", $client_ID, PDO::PARAM_INT);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":CIN", $CIN);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":number", $number);
        $stmt->bindParam(":isDeleted", $isDeleted, PDO::PARAM_INT);

        $stmt->execute();
    }

    public function edit(Client $client)  {

        $pdo = $this->connect();

        $client_ID = $client->getClient_ID();
        $name = $client->getName();
        $CIN = $client->getCIN();
        $address = $client->getAddress();
        $number = $client->getNumber();
        $isDeleted = $client->getIsDeleted();

        $sql = "UPDATE `Client` SET `name` = :name, `address` = :address, `CIN` = :CIN, `number` = :number, `isDeleted` = :isDeleted WHERE `client_ID` = :client_ID";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":client_ID", $client_ID, PDO::PARAM_INT);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":CIN", $CIN);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":number", $number);
        $stmt->bindParam(":isDeleted", $isDeleted, PDO::PARAM_INT);

        $stmt->execute();
    }

    public function delete($client_ID) {

        $pdo = $this->connect();

        $sql = "DELETE FROM Client WHERE client_ID = :client_ID";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":client_ID", $client_ID, PDO::PARAM_INT);

        $stmt->execute();
    }

    public function display() {
        
        $pdo = $this->connect();

        $sql = "SELECT * FROM Client";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $clients;
    }
}
?>