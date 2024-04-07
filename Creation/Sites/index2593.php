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

// Check if table exists, if not create it
$tableCheckQuery = "SHOW TABLES LIKE 'bmi_records'";
$tableExists = $conn->query($tableCheckQuery);
if ($tableExists->num_rows == 0) {
  $createTableQuery = "CREATE TABLE bmi_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    height FLOAT NOT NULL,
    weight FLOAT NOT NULL,
    bmi FLOAT NOT NULL,
    advice TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

  if (!$conn->query($createTableQuery)) {
    die("Error creating table: " . $conn->error);
  }
}

// Function to calculate BMI and give health advice
function calculateBMI($height, $weight) {
  $bmi = ($weight / ($height * $height)) * 10000; // Height in cm, weight in kg
  $advice = "";
  if ($bmi < 18.5) {
    $advice = "Underweight: Eat more, include protein and carbs in your diet.";
  } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
    $advice = "Normal: Keep up the good work!";
  } elseif ($bmi >= 25 && $bmi <= 29.9) {
    $advice = "Overweight: Consider exercising and eating healthy.";
  } else { // 30 and above
    $advice = "Obese: Seek professional health advice.";
  }

  return array($bmi, $advice);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $height = $_POST["height"];
  $weight = $_POST["weight"];

  list($bmi, $advice) = calculateBMI($height, $weight);

  // Insert into db
  $stmt = $conn->prepare("INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ddds", $height, $weight, $bmi, $advice);
  $stmt->execute();

  // Feedback to user
  echo "Your BMI is: " . number_format($bmi, 2) . "<br>";
  echo "Health advice: " . $advice;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>BMI Calculator</title>
<style>
body {font-family: Arial, sans-serif; margin: 40px; background-color: #f0f0f0;}
form {background-color: #ffffff; padding: 20px; border-radius: 8px;}
input[type = number], input[type = submit] {padding: 10px; margin: 10px;}
</style>
</head>
<body>

<h2>Body Mass Index (BMI) Calculator</h2>

<form method="post">
  <label for="height">Height (cm):</label><br>
  <input type="number" id="height" name="height" required><br>
  <label for="weight">Weight (kg):</label><br>
  <input type="number" id="weight" name="weight" required><br>
  <input type="submit" value="Calculate BMI">
</form>

</body>
</html>
<?php
$conn->close();
?>
