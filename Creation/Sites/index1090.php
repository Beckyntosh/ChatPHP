<?php

// Database connection
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

// Check if table exists, if not create it
$sql = "CREATE TABLE IF NOT EXISTS energy_consumption (
id INT AUTO_INCREMENT PRIMARY KEY,
household VARCHAR(255) NOT NULL,
monthly_energy_use INT NOT NULL,
saving_tips TEXT NOT NULL,
reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle the form submission
$household = "";
$monthly_energy_use = 0;
$saving_tips = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $household = $_POST["household"];
  $monthly_energy_use = $_POST["monthly_energy_use"];

  // Calculations for saving tips, this is a simple dummy example
  $saving_tips = "Consider LED bulbs, reduce heating.";
  $sql = "INSERT INTO energy_consumption (household, monthly_energy_use, saving_tips)
  VALUES ('$household', '$monthly_energy_use', '$saving_tips')";

  if ($conn->query($sql) === TRUE) {
    echo "Record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home Energy Use Calculator</title>
<style>
/* Add your styles here */
body {
  font-family: Arial, sans-serif;
}
.container {
  max-width: 600px;
  margin: 20px auto;
  padding: 20px;
  background-color: #f4f4f4;
  border-radius: 8px;
}
input[type='text'], input[type='number'] {
  width: 100%;
  padding: 8px;
  margin: 10px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type='submit'] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
input[type='submit']:hover {
  background-color: #45a049;
}
</style>
</head>
<body>

<div class="container">
  <h2>Calculate your Home's Energy Use</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="household">Household Name:</label>
    <input type="text" id="household" name="household" required>
    
    <label for="monthly_energy_use">Monthly Energy Use (kWh):</label>
    <input type="number" id="monthly_energy_use" name="monthly_energy_use" required>
    
    <input type="submit" value="Calculate">
  </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  echo "<div class='container'><h3>Saving Tips</h3><p>$saving_tips</p></div>";
}
?>

</body>
</html>
<?php
$conn->close();
?>
