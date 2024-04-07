<?php
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
    $plant_name = $_POST['plant_name'];
    $care_schedule = $_POST['care_schedule'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO Plants (plant_name, care_schedule) VALUES (?, ?)");
    $stmt->bind_param("ss", $plant_name, $care_schedule);
    
    // Execute and check
    if ($stmt->execute() === TRUE) {
        echo "New plant added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
}

// Create table if not exists
$table = "CREATE TABLE IF NOT EXISTS Plants (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
plant_name VARCHAR(30) NOT NULL,
care_schedule VARCHAR(100) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
  //echo "Table Plants created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Gardening Tracker</title>
</head>
<body>

<h2>Add a Plant to Gardening Tracker</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Plant Name: <input type="text" name="plant_name" required>
  <br><br>
  Care Schedule: <input type="text" name="care_schedule" required>
  <br><br>
  <input type="submit" name="submit" value="Add Plant">
</form>

</body>
</html>
