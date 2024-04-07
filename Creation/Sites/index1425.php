<?php
//Database connection
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

// Create table if it doesn't exist
$table = "CREATE TABLE IF NOT EXISTS plants (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
plant_name VARCHAR(30) NOT NULL,
care_schedule TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
    //echo "Table Plants created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect value of input field
    $plant_name = $_POST['plant_name'];
    $care_schedule = $_POST['care_schedule'];
    if (!empty($plant_name)) {
        // Insert data into the table
        $sql = "INSERT INTO plants (plant_name, care_schedule) VALUES ('$plant_name', '$care_schedule')";
        
        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add a Plant to Gardening Tracker</title>
</head>
<body>

<h2>Add a Plant to Your Garden</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="plant_name">Plant Name:</label><br>
  <input type="text" id="plant_name" name="plant_name"><br>
  
  <label for="care_schedule">Care Schedule:</label><br>
  <textarea id="care_schedule" name="care_schedule"></textarea><br><br>
  
  <input type="submit" value="Add Plant">
</form>

</body>
</html>

<?php
$conn->close();
?>
