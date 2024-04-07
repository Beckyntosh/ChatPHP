<?php

// Simple User Signup Script for a Toys Website

// Database Configuration
define("DB_SERVER", "db");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "my_database");

// Attempting MySQL server connection
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["name"]) && !empty($_POST["email"])) {
    // Prepare an insert statement
    $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
    
    if($stmt = $pdo->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":name", $param_name);
        $stmt->bindParam(":email", $param_email);
        
        // Set parameters
        $param_name = trim($_POST["name"]);
        $param_email = trim($_POST["email"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()) {
            echo "<p>Signup successful!</p>";
        } else {
            echo "<p>Something went wrong. Please try again later.</p>";
        }
        
        // Close statement
        unset($stmt);
    }
}

// Close connection
unset($pdo);

?>

<!DOCTYPE HTML>  
<html>
<head>
<title>Toy Website - User Signup</title>
</head>
<body>

<h2>User Signup</h2>
<form method="post">
  <label>Name:</label>
  <input type="text" name="name" required>
  <br><br>
  <label>Email:</label>
  <input type="email" name="email" required>
  <br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>
