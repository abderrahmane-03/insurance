<?php

require_once("../models/Database.php");
require_once("IAssuranceService.php");
require_once("../models/Assurance.php");

class AssuranceService extends Database implements IAssuranceService {

    public function insert(Assurance $assurance) {
        $pdo = $this->connect();

        try {
            $pdo->beginTransaction();

            $assurance_ID = $assurance->getAssurance_ID();
            $name = $assurance->getName();
            $logo = $assurance->getLogo();
            $isDeleted = $assurance->getIsDeleted();

            $sql = "INSERT INTO assurance VALUES (:assurance_ID, :name, :logo, :isDeleted )";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":assurance_ID", $assurance_ID, PDO::PARAM_INT);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":logo", $logo);
            $stmt->bindParam(":isDeleted", $isDeleted, PDO::PARAM_INT);

            $stmt->execute();

            $pdo->commit();

        } catch (PDOException $e) {
            $pdo->rollBack();
            die("Error: " . $e->getMessage());
        }
    }

    public function edit(Assurance $assurance) {
        $pdo = $this->connect();

        try {
            $pdo->beginTransaction();

            $assurance_ID = $assurance->getAssurance_ID();
            $name = $assurance->getName();
            $logo = $assurance->getLogo();
            $isDeleted = $assurance->getIsDeleted();

            $sql = "UPDATE `Assurance` SET `name` = name, `logo`= :logo, `isDeleted` = :isDeleted WHERE `assurance_ID` = :assurance_ID";
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":assurance_ID", $assurance_ID, PDO::PARAM_INT);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":logo", $logo);
            $stmt->bindParam(":isDeleted", $isDeleted, PDO::PARAM_INT);

            $stmt->execute();

            $pdo->commit();

        } catch (PDOException $e) {
            $pdo->rollBack();
            die("Error: ". $e->getMessage());
        }
    }

    public function delete($assurance_ID) {
        $pdo = $this->connect();

        try {
            $pdo->beginTransaction();

            $sql ="DELETE FROM Assurance WHERE assurance_ID = :assurance_ID";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":assurance", $assurance_ID, PDO::PARAM_INT);

            $stmt->execute();

            $pdo->commit();

        } catch (PDOException $e) {
            $pdo->rollBack();
            die("Error: ". $e->getMessage());
        }
    }

    public function display() {
        $pdo = $this->connect();

        try {
            $pdo->beginTransaction();

            $sql = "SELECT * FROM Assurance";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $assurances = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $pdo->commit();

            return $assurances;

        } catch (PDOException $e) {
            $pdo->rollBack();
            die("Error: ". $e->getMessage());
        }
    }
}

?>