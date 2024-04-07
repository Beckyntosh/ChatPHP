// PARAMETERS: Function: Body Mass Index (BMI) Calculator: "Determine BMI by entering height and weight, and provide health recommendations. Example: User enters their height and weight to calculate BMI and receive health advice Product: Bath Products Style: intelligent
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
$table = "CREATE TABLE IF NOT EXISTS bmiRecords (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
height FLOAT NOT NULL,
weight FLOAT NOT NULL,
bmi FLOAT NOT NULL,
advice VARCHAR(255) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

$bmi = $advice = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $height = $_POST["height"];
  $weight = $_POST["weight"];
  $bmi = $weight / (($height / 100) ** 2);

  if ($bmi <= 18.5) {
    $advice = "Underweight: Consider gaining weight.";
  } else if ($bmi > 18.5 && $bmi <= 24.9) {
    $advice = "Normal weight: Keep up the good work!";
  } else if ($bmi >= 25 && $bmi <= 29.9) {
    $advice = "Overweight: Consider losing weight.";
  } else {
    $advice = "Obesity: Seek professional health advice.";
  }

  // Insert record into the database
  $sql = "INSERT INTO bmiRecords (height, weight, bmi, advice) VALUES ('$height', '$weight', '$bmi', '$advice')";

  if ($conn->query($sql) === TRUE) {
    // Record created successfully
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>BMI Calculator</title>
</head>
<body>
<h1>Body Mass Index (BMI) Calculator</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Height (cm): <input type="number" name="height" required><br><br>
  Weight (kg): <input type="number" name="weight" required><br><br>
  <input type="submit" name="calculate" value="Calculate BMI">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  echo "<h2>Your BMI is: " . number_format($bmi, 2) . "</h2>";
  echo "<p>" . $advice . "</p>";
}
?>

</body>
</html>
