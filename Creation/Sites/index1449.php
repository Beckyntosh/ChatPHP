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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS plants (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
plant_name VARCHAR(30) NOT NULL,
care_schedule TEXT NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // echo "Table Plants created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $plant_name = $_POST["plant_name"];
  $care_schedule = $_POST["care_schedule"];

  $stmt = $conn->prepare("INSERT INTO plants (plant_name, care_schedule) VALUES (?, ?)");
  $stmt->bind_param("ss", $plant_name, $care_schedule);

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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add a Plant to Gardening Tracker</title>
<style>
  body { font-family: Arial, sans-serif; }
  .container { max-width: 600px; margin: auto; padding: 20px; }
  form { margin-top: 20px; }
  input, textarea { width: 100%; padding: 10px; margin: 10px 0; }
  button { padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
  button:hover { background-color: #45a049; }
</style>
</head>
<body>

<div class="container">
  <h2>Add a Plant to Your Garden</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <label for="plant_name">Plant Name:</label>
    <input type="text" id="plant_name" name="plant_name" required>
    
    <label for="care_schedule">Care Schedule:</label>
    <textarea id="care_schedule" name="care_schedule" rows="4" required></textarea>
    
    <button type="submit">Add Plant</button>
  </form>
</div>

</body>
</html>
