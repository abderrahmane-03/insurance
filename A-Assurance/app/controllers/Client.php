<?php
require_once("../models/Client.php");
require_once("../services/ClientService.php");

$clientService = new ClientService();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['action'] == 'addClient') {
        $client_ID = uniqid(mt_rand(), true);
        $name = $_POST['name'];
        $CIN = $_POST['CIN'];
        $address = $_POST['address'];
        $number = $_POST['number'];
        $isDeleted = 0;

        $client = new Client($client_ID, $name, $CIN, $address, $number, $isDeleted);

        $clientService->insert($client);

        header("Location: ../views/Client.php");
        exit;

    } elseif ($_POST['action'] == 'editClient') {
        $client_ID = $_POST['client_ID'];
        $name = $_POST['name'];
        $CIN = $_POST['CIN'];
        $address = $_POST['address'];
        $number = $_POST['number'];
        $isDeleted = 0; 

        $client = new Client($client_ID, $name, $CIN, $address, $number, $isDeleted);

        $clientService->edit($client);

        header("Location: ../views/Client.php");
        exit;

    } elseif ($_POST['action'] == 'deleteClient') {
        $client_ID = $_POST['delete_client_ID'];

        $clientService->delete($client_ID);

        header("Location: ../views/Client.php");
        exit;
    }
}


$clients = $clientService->display();


?>