<?php

// information needed to connect to database
$dsn = "mysql:host=localhost;dbname=myfirstdatabase"; // Data Source 
$dbUsername = "root";
$dbPassword = ""; 

// PDO = PHP Data Object, ALternatives: MySQLi(MySQL Improved)
try {
    $pdo = new PDO($dsn, $dbUsername, $dbPassword); // PDO connection
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // If we get an error, throw exception
} catch (PDOException $e) { // In case information is incorrect 
    echo "Connection failed: " . $e->getMessage();
}