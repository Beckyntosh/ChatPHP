<?php
// Gardening Tracker: Add a Plant Feature
// File: add-plant.php (Single-file approach for simplicity)

// Database connection parameters
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect post data
    $plant_name = $_POST['plant_name'];
    $care_schedule = $_POST['care_schedule'];

    // Sanitize input
    $plant_name = htmlspecialchars(strip_tags($plant_name));
    $care_schedule = htmlspecialchars(strip_tags($care_schedule));

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO plants (plant_name, care_schedule) VALUES (?, ?)");
    $stmt->bind_param("ss", $plant_name, $care_schedule);

    // Execute and check
    if ($stmt->execute()) {
        echo "New plant successfully added!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add a Plant to Gardening Tracker</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; }
        .container { max-width: 600px; margin: 20px auto; background: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h2 { color: #333; }
        form { display: flex; flex-direction: column; }
        label { margin-top: 10px; }
        input[type=text], textarea { padding: 10px; margin-top: 5px; margin-bottom: 20px; border: 1px solid #ddd; border-radius: 5px; }
        input[type=submit] { background: #28a745; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
        input[type=submit]:hover { background: #218838; }
    </style>
</head>
<body>

<div class="container">
    <h2>Add a New Plant</h2>
    <form method="POST">
        <label for="plant_name">Plant Name:</label>
        <input type="text" id="plant_name" name="plant_name" required>

        <label for="care_schedule">Care Schedule:</label>
        <textarea id="care_schedule" name="care_schedule" rows="4" required></textarea>

        <input type="submit" value="Add Plant">
    </form>
</div>

</body>
</html>
