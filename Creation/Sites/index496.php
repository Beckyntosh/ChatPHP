<?php
// Define mysqli connection parameters
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
$sql = "CREATE TABLE IF NOT EXISTS exercises (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
exercise_name VARCHAR(30) NOT NULL,
duration INT(10),
intensity VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // echo "Table exercises created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exercise_name = $_POST['exercise_name'];
    $duration = $_POST['duration'];
    $intensity = $_POST['intensity'];

    $stmt = $conn->prepare("INSERT INTO exercises (exercise_name, duration, intensity) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $exercise_name, $duration, $intensity);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Exercise Log</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 95%; max-width: 600px; margin: auto; }
        form { display: flex; flex-direction: column; gap: 12px; }
        label { font-weight: bold; }
        input, select, button { padding: 10px; font-size: 16px; }
        button { background-color: #007bff; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Log an Exercise</h2>
        <form method="POST" action="">
            <label for="exercise_name">Exercise Name:</label>
            <input type="text" id="exercise_name" name="exercise_name" required>
            
            <label for="duration">Duration (in minutes):</label>
            <input type="number" id="duration" name="duration" required>
            
            <label for="intensity">Intensity:</label>
            <select id="intensity" name="intensity">
                <option value="low">Low</option>
                <option value="moderate" selected>Moderate</option>
                <option value="high">High</option>
            </select>
            
            <button type="submit">Add Exercise</button>
        </form>
    </div>
</body>
</html>
