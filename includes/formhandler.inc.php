<?php

// Check that user sumbits data correctly
if($_SERVER["REQUEST_METHOD"] == "POST") { // Post method example: <form action="includes/formhandler.inc.php" method="post">

    // Grab user data htmlspecialchars() prevents XSS attacks but only needs to be used when outputting, prevents having db data in format of specialcharacters
    $username = $_POST["username"];  
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try{
        require_once "dbh.inc.php"; // Link to database
        $query = "INSERT INTO users (username, pwd, email) 
                VALUES (:username, :pwd, :email);";

                // First submit query to database
                $stmt = $pdo->prepare($query); 

                // Then bind parameters to query
                $stmt->bindParam(":username", $username); 
                $stmt->bindParam(":pwd", $pwd);
                $stmt->bindParam(":email", $email);

                $stmt->execute(); // Execute query
                $pdo = null;
                $stmt = null;

                header("Location: ../index.php"); // Redirect user to index.php

                die(); // When closing connection to database, die() is used to stop script from running, if theres no connection running use exit()
    } catch(PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
// Send user back to index.php if they try to access this page without submitting data
else {
    header("Location: ../index.php"); // Redirect user to index.php
}
