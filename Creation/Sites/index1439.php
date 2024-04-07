<?php
// Include database connection
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
plant_name VARCHAR(50) NOT NULL,
care_schedule TEXT NOT NULL,
reg_date TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
  // echo "Table plants created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $plant_name = $_POST['plant_name'];
  $care_schedule = $_POST['care_schedule'];

  $stmt = $conn->prepare("INSERT INTO plants (plant_name, care_schedule) VALUES (?, ?)");
  $stmt->bind_param("ss", $plant_name, $care_schedule);

  if ($stmt->execute() === TRUE) {
    echo "<script>alert('New record created successfully');</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add a Plant to Gardening Tracker</title>
</head>
<body style="font-family: monospace; background-color: #111; color: #fff;">
<h2 style="color: #4CAF50;">Gardening Tracker - Add a Plant</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="margin: 20px;">
  <label for="plant_name">Plant Name:</label><br>
  <input type="text" id="plant_name" name="plant_name" value="Tomato" required style="margin-bottom: 10px;"><br>
  <label for="care_schedule">Care Schedule:</label><br>
  <textarea id="care_schedule" name="care_schedule" rows="4" cols="50" required>Water daily. Fertilize weekly.</textarea><br><br>
  <input type="submit" value="Add Plant" style="background-color: #4CAF50; color: white; padding: 10px 20px; margin: 4px 0; border: none; cursor: pointer;">
</form>
Display Added Plants
<h2 style="color: #4CAF50;">Added Plants</h2>
<div id="plants" style="margin: 20px;">
    <?php
    $sql = "SELECT id, plant_name, care_schedule, reg_date FROM plants";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<p><strong>Name:</strong> " . $row["plant_name"]. " - <strong>Care:</strong> " . $row["care_schedule"]. " - <strong>Added on:</strong> " . $row["reg_date"]. "</p>";
      }
    } else {
      echo "0 results";
    }
    $conn->close();
    ?>
</div>
</body>
</html>
