<?php
// Define MySQL connection details
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Attempt MySQL server connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$tableCheckQuery = "CREATE TABLE IF NOT EXISTS plants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plant_name VARCHAR(30) NOT NULL,
    care_schedule VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($tableCheckQuery) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plant_name = $_POST['plant_name'];
    $care_schedule = $_POST['care_schedule'];

    $sql = "INSERT INTO plants (plant_name, care_schedule) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ss", $plant_name, $care_schedule);

    // Execute statement
    if ($stmt->execute()) {
        echo "New plant added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add a Plant to Gardening Tracker</title>
</head>
<body>

<h2>Add a Plant to your Garden</h2>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="plant_name">Plant name:</label><br>
    <input type="text" id="plant_name" name="plant_name" required><br>
    <label for="care_schedule">Care Schedule:</label><br>
    <textarea id="care_schedule" name="care_schedule" rows="4" cols="50" required></textarea><br>
    <input type="submit" value="Add Plant">
</form>

</body>
</html>
