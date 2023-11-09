<?php
// Check that user sumbits data correctly
if($_SERVER["REQUEST_METHOD"] == "POST") { // Post method example: <form action="includes/formhandler.inc.php" method="post">

    // Grab user data htmlspecialchars() prevents XSS attacks but only needs to be used when outputting, prevents having db data in format of specialcharacters
    $usersearch = $_POST["usersearch"];  

    try{
        require_once "includes/dbh.inc.php"; // Link to database
        $query = "SELECT * FROM users 
                WHERE username = :usersearch OR email = :usersearch;";

                // First submit query to database
                $stmt = $pdo->prepare($query); 

                // Then bind parameters to query
                $stmt->bindParam(":usersearch", $usersearch); 

                $stmt->execute(); // Execute query

                $results = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all results from query as associative array

                $pdo = null;
                $stmt = null;

    } catch(PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
// Send user back to index.php if they try to access this page without submitting data
else {
    header("Location: ../index.php"); // Redirect user to index.php
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section></section>
    <h3>Search results:</h3>

    <?php
        if(empty($results)) {
            echo "<div>";
            echo "<p>No results found.</p>";
            echo "<div>";
        }   
        else { 
            foreach ($results as $row) {
                echo "<div>";
                echo "<h4>" . htmlspecialchars($row["username"]) . "</h4>"; 
                echo "<p>" . htmlspecialchars($row["email"]) . "</p>";
                echo "<p>" . htmlspecialchars($row["created_at"]) . " </p>";
                echo "</div>";
            }
        }
    ?>
</section>
</body>
</html>