<?php
// Check request method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Variables for the form data
    $petName = $_POST['petName'];
    $petType = $_POST['petType'];
    $petBreed = $_POST['petBreed'];
    $healthInfo = $_POST['healthInfo'];

    // Database details
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    try {
        // Establish database connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // SQL to create table if not exists
        $sql = "CREATE TABLE IF NOT EXISTS PetProfiles (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            petName VARCHAR(30) NOT NULL,
            petType VARCHAR(30) NOT NULL,
            petBreed VARCHAR(30) NOT NULL,
            healthInfo TEXT,
            reg_date TIMESTAMP
        )";

        // Use exec() because no results are returned
        $conn->exec($sql);
        
        // Prepare SQL and bind parameters
        $stmt = $conn->prepare("INSERT INTO PetProfiles (petName, petType, petBreed, healthInfo) 
        VALUES (:petName, :petType, :petBreed, :healthInfo)");
        $stmt->bindParam(':petName', $petName);
        $stmt->bindParam(':petType', $petType);
        $stmt->bindParam(':petBreed', $petBreed);
        $stmt->bindParam(':healthInfo', $healthInfo);
        
        // Insert a row
        $stmt->execute();
        $success = "New record created successfully";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Pet Profile</title>
</head>
<body>

<h2>Pet Profile Form</h2>

<form action="" method="post">
    Pet Name: <input type="text" name="petName" required><br><br>
    Pet Type: <input type="text" name="petType" required><br><br>
    Pet Breed: <input type="text" name="petBreed" required><br><br>
    Health Info: <textarea name="healthInfo" required></textarea><br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
