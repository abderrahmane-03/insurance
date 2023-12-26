<?php

require_once("../models/Assurance.php");
require_once("../services/AssuranceService.php");

$assuranceService = new AssuranceService();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'addAssurance') {
        $assurance_ID = uniqid(mt_rand(), true);
        $name = $_POST['name'];
        $logo = uploadLogo($_FILES['logo']);
        $isDeleted = 0;

        $assurance = new Assurance($assurance_ID, $name, $logo, $isDeleted);

        $assuranceService->insert($assurance);

        header("Location: ../views/Assurance.php");
        exit;

    } else if ($_POST["action"] == "editAssurance") {
        $assurance_ID = $_POST['$assurance_ID'];
        $name = $_POST['name'];
        $logo = uploadLogo($_FILES['assurace_ID']);
        $isDeleted = 0;

        $assurance = new Assurance($assurance_ID, $name, $logo, $isDeleted);

        $assuranceService->edit($assurance);

        header("Location: ../views/Assurance.php");
        exit;

    } else if ($_POST['action'] == "deleteAssurance") {
        $assurance_ID = $_POST["delete_assurance_ID"];

        $assuranceService->delete($assurance_ID);

        header("Location: ../views/Assurance.php");
        exit;
    }
}

$assurances = $assuranceService->display();

#----- to handle the upload of logos------

function uploadLogo($file) {
    $targetDir = "C:xampp/htdocs/A-Assurance/uploades/assurance_logos/";
    $targetFile = $targetDir . basename($file["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($file["tmp_name"]);
    if($check === false) {
        die("Sorry,you are not selecting an image.");
    }

    
    if($file["size"] > 500000) {
        die("Sorry, your file is too large.");
    }

    $allowedFormats = ["jpg", "jpeg", "png", "gif"];
    if(!in_array($imageFileType, $allowedFormats)) {
        die("Sorry, only JPG, JPEG, PNG, and GIF files are allowed.");
    }

    if ($uploadOk == 0) {
        die("Sorry, your file was not uploaded.");

    }else {
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return $targetFile;
        } else {
            die("Sorry, there was an error uploading your file.");
        }
    }
}
?>