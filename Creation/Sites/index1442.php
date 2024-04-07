<?php
// Database connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Creating connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for plants if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS plants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plant_name VARCHAR(50) NOT NULL,
    care_schedule VARCHAR(250),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plantName = $_POST['plantName'];
    $careSchedule = $_POST['careSchedule'];

    $stmt = $conn->prepare("INSERT INTO plants (plant_name, care_schedule) VALUES (?, ?)");
    $stmt->bind_param("ss", $plantName, $careSchedule);

    if ($stmt->execute() === TRUE) {
        echo "<script>alert('New plant added successfully');</script>";
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
    <title>Add a Plant to Your Garden</title>
</head>
<body>

<h2>Add a New Plant to the Gardening Tracker</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="plantName">Plant Name:</label><br>
  <input type="text" id="plantName" name="plantName" required><br>
  <label for="careSchedule">Care Schedule:</label><br>
  <input type="text" id="careSchedule" name="careSchedule" required><br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
