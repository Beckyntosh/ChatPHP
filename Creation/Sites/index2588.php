<?php
// Connect to MySQL database
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
$tableQuery = "CREATE TABLE IF NOT EXISTS bmi_records (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
height DECIMAL(5,2) NOT NULL,
weight DECIMAL(5,2) NOT NULL,
bmi DECIMAL(5,2) NOT NULL,
advice TEXT NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($tableQuery) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Function to calculate BMI and give health advice
function calculateBMI($height, $weight) {
  $heightInMeters = $height * 0.0254;
  $bmi = $weight / ($heightInMeters * $heightInMeters);

  if ($bmi <= 18.5) {
    $advice = "Underweight - Good nutrition and exercise are advised.";
  } elseif ($bmi > 18.5 && $bmi <= 24.9) {
    $advice = "Normal weight - Keep up the good work!";
  } elseif ($bmi >= 25 && $bmi <= 29.9) {
    $advice = "Overweight - Diet and exercise are recommended.";
  } else {
    $advice = "Obese - Seeking medical advice is recommended.";
  }

  return array(round($bmi, 2), $advice);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $height = filter_var($_POST['height'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  $weight = filter_var($_POST['weight'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

  list($bmi, $advice) = calculateBMI($height, $weight);

  // Insert form data into database
  $stmt = $conn->prepare("INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ddds", $height, $weight, $bmi, $advice);
  $stmt->execute();
  $stmt->close();
  
  $resultMessage = "Your BMI is $bmi. $advice";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>BMI Calculator</title>
  <style>
    body { font-family: Arial, sans-serif; background-color: #e9ecef; padding: 20px; }
    form { background: white; padding: 20px; border-radius: 8px; }
    label, input { display: block; margin-bottom: 10px; }
    input { padding: 10px; width: calc(100% - 22px); }
    button { padding: 10px 20px; cursor: pointer; }
  </style>
</head>
<body>
  <h2>BMI Calculator</h2>
  <form method="post">
    <label for="height">Height (inches):</label>
    <input type="number" id="height" name="height" step="0.01" required>
    <label for="weight">Weight (pounds):</label>
    <input type="number" id="weight" name="weight" step="0.01" required>
    <button type="submit">Calculate BMI</button>
  </form>
  <?php
    if (isset($resultMessage)) {
      echo "<p>$resultMessage</p>";
    }
  ?>
</body>
</html>
