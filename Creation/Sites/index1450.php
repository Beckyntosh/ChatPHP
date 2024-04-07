<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $plant_name = htmlspecialchars($_POST['plant_name']);
    $care_schedule = htmlspecialchars($_POST['care_schedule']);

    // Database connection details
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

    // SQL to create table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS garden_plants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plant_name VARCHAR(50) NOT NULL,
    care_schedule TEXT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) !== TRUE) {
        echo "Error creating table: " . $conn->error;
    }

    // Prepare SQL to insert data
    $stmt = $conn->prepare("INSERT INTO garden_plants (plant_name, care_schedule) VALUES (?, ?)");
    $stmt->bind_param("ss", $plant_name, $care_schedule);

    // Execute query and check if successful
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Plant to Gardening Tracker</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        form { display: flex; flex-direction: column; }
        label, input, textarea, button { margin-bottom: 10px; }
        label { font-weight: bold; }
        input, textarea, button { padding: 10px; }
        button { background: green; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>

<div class="container">
    <h2>Add a Plant to Your Garden</h2>
    <form action="" method="post">
        <label for="plant_name">Plant Name:</label>
        <input type="text" id="plant_name" name="plant_name" required>

        <label for="care_schedule">Care Schedule:</label>
        <textarea id="care_schedule" name="care_schedule" rows="4" required></textarea>

        <button type="submit">Add Plant</button>
    </form>
</div>

</body>
</html>
