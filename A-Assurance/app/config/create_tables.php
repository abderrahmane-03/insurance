<?php

// require("config/config.php");

// try {
//     $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     $sql = "
//         CREATE DATABASE IF NOT EXISTS " . DB_NAME . ";
//         USE " . DB_NAME . ";

//         CREATE TABLE IF NOT EXISTS Client (
//             Client_ID INT PRIMARY KEY ,
//             Name VARCHAR(200),
//             CIN VARCHAR(50),
//             Address VARCHAR(255),
//             Number VARCHAR(20),
//             IsDeleted BOOLEAN DEFAULT FALSE
//         );

//         CREATE TABLE IF NOT EXISTS Assurance (
//             Assurance_ID INT PRIMARY KEY ,
//             Name VARCHAR(200),
//             Logo VARCHAR(255),
//             IsDeleted BOOLEAN DEFAULT FALSE
//         );

//         CREATE TABLE IF NOT EXISTS AssurClient (
//             AssurClient_ID INT AUTO_INCREMENT PRIMARY KEY ,
//             Client_ID INT ,
//             Assurance_ID INT,
//             IsDeleted BOOLEAN DEFAULT FALSE,
//             FOREIGN KEY (Client_ID) REFERENCES Client(Client_ID) ON DELETE CASCADE ON UPDATE CASCADE,
//             FOREIGN KEY (Assurance_ID) REFERENCES Assurance(Assurance_ID) ON DELETE CASCADE ON UPDATE CASCADE,
//             CHECK (IsDeleted IN (0,1))
//         );

//         CREATE TABLE IF NOT EXISTS Article (
//             Article_ID INT PRIMARY KEY ,
//             Title VARCHAR(255) ,
//             Description VARCHAR(300) ,
//             Date DATETIME ,
//             Client_ID INT ,
//             Assurance_ID INT ,
//             IsDeleted BOOLEAN DEFAULT FALSE,
//             FOREIGN KEY (Client_ID) REFERENCES Client(Client_ID) ON DELETE CASCADE ON UPDATE CASCADE,
//             FOREIGN KEY (Assurance_ID) REFERENCES Assurance(Assurance_ID) ON DELETE CASCADE ON UPDATE CASCADE,
//             CHECK (IsDeleted IN (0,1))
//         );

//         CREATE TABLE IF NOT EXISTS Claim (
//             Claim_ID INT PRIMARY KEY ,
//             Descreption VARCHAR (300) ,
//             Date DATETIME ,
//             Article_ID INT ,
//             IsDeleted BOOLEAN DEFAULT FALSE,
//             FOREIGN KEY (Article_ID) REFERENCES Article(Article_ID) ON DELETE CASCADE ON UPDATE CASCADE,
//             CHECK (IsDeleted IN (0,1))
//         );

//         CREATE TABLE IF NOT EXISTS Premium (
//             Premium_ID INT PRIMARY KEY ,
//             Amount INT ,
//             Date DATETIME ,
//             Claim_ID INT ,
//             IsDeleted BOOLEAN DEFAULT FALSE,
//             FOREIGN KEY (Claim_ID) REFERENCES Claim(Claim_ID) ON DELETE CASCADE ON UPDATE CASCADE ,
//             CHECK (IsDeleted IN (0,1))
//         );
//     ";

//     $pdo->exec($sql);

//     echo "Tables created successfully.";
// } catch (PDOException $e) {
//     die("Error creating tables: " . $e->getMessage());
// }

