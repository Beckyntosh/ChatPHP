<?php
// Establish database connection
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
$sql = "CREATE TABLE IF NOT EXISTS plants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plant_name VARCHAR(30) NOT NULL,
    planting_date DATE,
    care_schedule TEXT,
    growth_stage VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['plant_name'])) {
    $plant_name = $_POST['plant_name'];
    $planting_date = $_POST['planting_date'];
    $care_schedule = $_POST['care_schedule'];
    $growth_stage = $_POST['growth_stage'];

    $stmt = $conn->prepare("INSERT INTO plants (plant_name, planting_date, care_schedule, growth_stage) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $plant_name, $planting_date, $care_schedule, $growth_stage);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add a Plant - Gardening Tracker</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f3f4f6; }
        form { background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); max-width: 500px; }
        input[type=text], input[type=date], textarea { width: 100%; padding: 10px; margin: 8px 0 20px; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[type=submit] { width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
        .container { width: 100%; margin: auto; }
    </style>
</head>
<body>

<div class="container">
    <h2>Add a New Plant</h2>
    <form method="POST">
        <label for="plant_name">Plant Name:</label>
        <input type="text" id="plant_name" name="plant_name" required>
        
        <label for="planting_date">Planting Date:</label>
        <input type="date" id="planting_date" name="planting_date" required>
        
        <label for="care_schedule">Care Schedule:</label>
        <textarea id="care_schedule" name="care_schedule" required></textarea>
        
        <label for="growth_stage">Growth Stage:</label>
        <input type="text" id="growth_stage" name="growth_stage" required>
        
        <input type="submit" value="Add Plant">
    </form>
</div>

</body>
</html>
<?php
$conn->close();
?>