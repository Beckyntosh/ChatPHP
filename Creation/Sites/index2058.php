<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $petName = $_POST['petName'];
    $petType = $_POST['petType'];
    $age = $_POST['age'];
    $healthInfo = $_POST['healthInfo'];

    // Database configuration
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS Pets (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        petName VARCHAR(30) NOT NULL,
        petType VARCHAR(30) NOT NULL,
        age INT(3),
        healthInfo TEXT,
        reg_date TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        // Table created successfully or already exists
    } else {
        die("Error creating table: " . $conn->error);
    }

    // Insert pet profile data into table
    $stmt = $conn->prepare("INSERT INTO Pets (petName, petType, age, healthInfo) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $petName, $petType, $age, $healthInfo);
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pet Care Application - Create Pet Profile</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { margin: 20px; }
        .input-group { margin-bottom: 10px; }
        label, input, textarea { width: 100%; }
    </style>
</head>
<body>

<div class="container">
    <h2>Create a Pet Profile</h2>
    <form action="" method="post">
        <div class="input-group">
            <label for="petName">Pet Name:</label>
            <input type="text" id="petName" name="petName" required>
        </div>
        <div class="input-group">
            <label for="petType">Pet Type (e.g., Dog, Cat):</label>
            <input type="text" id="petType" name="petType" required>
        </div>
        <div class="input-group">
            <label for="age">Age:</label>
            <input type="number" id="age" name="age">
        </div>
        <div class="input-group">
            <label for="healthInfo">Health Information:</label>
            <textarea id="healthInfo" name="healthInfo" rows="4"></textarea>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>
