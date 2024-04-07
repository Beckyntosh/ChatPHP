<?php
// Check if form was submitted:
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["plant_name"])) {
    
    // Variables for MySQL connection
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
    
    // Sanitize input
    $plant_name = htmlspecialchars(strip_tags($_POST["plant_name"]));
    $care_schedule = htmlspecialchars(strip_tags($_POST["care_schedule"]));
    
    // Prepare SQL statement
    $sql = "INSERT INTO plants (name, care_schedule) VALUES (?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("ss", $plant_name, $care_schedule);
        
        // Execute statement
        if ($stmt->execute()) {
            echo "New plant added successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        // Close statement
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
    
    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add a Plant to Gardening Tracker</title>
</head>
<body>
    <h2>Add a New Plant</h2>
    <form action="add_plant.php" method="post">
        <label for="plant_name">Plant Name:</label><br>
        <input type="text" id="plant_name" name="plant_name" required><br>
        <label for="care_schedule">Care Schedule:</label><br>
        <textarea id="care_schedule" name="care_schedule" required></textarea><br>
        <input type="submit" value="Add Plant">
    </form>
</body>
</html>

<?php
// Only run this block to create the plants table once
*
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

// SQL to create table
$sql = "CREATE TABLE plants (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    care_schedule TEXT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table plants created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
*/
?>
