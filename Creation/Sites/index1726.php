<?php
// Simple Pet Profile Create Script with Front-end in PHP

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

// Create table if not exists
$tableQuery = "CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(30) NOT NULL,
    pet_type VARCHAR(30) NOT NULL,
    health_info TEXT,
    reg_date TIMESTAMP
)";

if (!$conn->query($tableQuery)) {
    echo "Error creating table: " . $conn->error;
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_name = $_POST['pet_name'];
    $pet_type = $_POST['pet_type'];
    $health_info = $_POST['health_info'];

    $insertQuery = "INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("sss", $pet_name, $pet_type, $health_info);

    if ($stmt->execute()) {
        echo "<p>Record created successfully</p>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Pet Profile</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 400px; margin: auto; padding: 20px; }
        form { display: flex; flex-direction: column; }
        label { margin-top: 10px; }
        input, textarea { padding: 8px; margin-top: 5px; }
        button { padding: 10px; margin-top: 20px; background-color: #007bff; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
<div class="container">
    <h2>Create Pet Profile</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="pet_name">Pet Name:</label>
        <input type="text" id="pet_name" name="pet_name" required>

        <label for="pet_type">Pet Type:</label>
        <input type="text" id="pet_type" name="pet_type" required>

        <label for="health_info">Health Info:</label>
        <textarea id="health_info" name="health_info" rows="4" required></textarea>

        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>
