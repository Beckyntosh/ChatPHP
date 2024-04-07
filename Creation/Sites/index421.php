<?php
// Connection parameters
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

// Attempt to create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS BMIRecords (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
height FLOAT NOT NULL,
weight FLOAT NOT NULL,
bmi FLOAT NOT NULL,
advice VARCHAR(255) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Successfully created or confirmed existence of table
} else {
  echo "Error creating table: " . $conn->error;
}

function insertBMIRecord($conn, $height, $weight, $bmi, $advice) {
  $stmt = $conn->prepare("INSERT INTO BMIRecords (height, weight, bmi, advice) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ddds", $height, $weight, $bmi, $advice);
  $stmt->execute();
  $stmt->close();
}

function calculateBMI($weight, $height) {
  $bmi = $weight / ($height * $height);
  return $bmi;
}

function getHealthAdvice($bmi) {
  if ($bmi <= 18.5) {
    return "Underweight - Good nutrition and exercise are recommended.";
  } elseif ($bmi > 18.5 && $bmi <= 24.9) {
    return "Normal weight - Keep up the good work!";
  } elseif ($bmi >= 25 && $bmi <= 29.9) {
    return "Overweight - A healthy diet and more exercise are advised.";
  } else {
    return "Obesity - Medical advice is recommended to reduce health risks.";
  }
}

$height = $weight = $bmi = $advice = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $height = $_POST["height"];
  $weight = $_POST["weight"];
  $bmi = calculateBMI($weight, $height);
  $advice = getHealthAdvice($bmi);
  insertBMIRecord($conn, $height, $weight, $bmi, $advice);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>BMI Calculator</title>
</head>
<body>
<h1>Machiavellien Style BMI Calculator</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Height (meters): <input type="text" name="height">
  <br><br>
  Weight (kilograms): <input type="text" name="weight">
  <br><br>
  <input type="submit" name="submit" value="Calculate BMI">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  echo "<h2>Your BMI Result:</h2>";
  echo "Height: " . $height . " meters<br>";
  echo "Weight: " . $weight . " kg<br>";
  echo "BMI: " . number_format($bmi, 2) . "<br>";
  echo "Health Advice: " . $advice . "<br>";
}
?>
</body>
</html>

<?php
$conn->close();
?>