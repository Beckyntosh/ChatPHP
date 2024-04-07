<?php

// Define database connection variables
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

// Create table for storing BMI calculations if it doesn't exist
$tableQuery = "CREATE TABLE IF NOT EXISTS bmi_records (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  height DOUBLE NOT NULL,
  weight DOUBLE NOT NULL,
  bmi DOUBLE NOT NULL,
  advice TEXT,
  calculation_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

if (!$conn->query($tableQuery)) {
  die("Error creating table: " . $conn->error);
}

// Initialize variables
$height = $weight = $bmi = $advice = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $height = $_POST["height"];
  $weight = $_POST["weight"];
  // Calculate BMI
  if($height > 0 && $weight > 0){
    $heightInMeters = $height / 100;
    $bmi = round($weight / ($heightInMeters * $heightInMeters), 1);

    // Determine health advice based on BMI
    if ($bmi < 18.5) {
      $advice = "Underweight - Good nutrition is important. Consider a diet.";
    } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
      $advice = "Normal weight - Keep up the good work!";
    } elseif ($bmi >= 25 && $bmi <= 29.9) {
      $advice = "Overweight - A healthier diet and exercise might be beneficial.";
    } else {
      $advice = "Obesity - Medical advice is recommended.";
    }

    // Insert BMI calculation into database
    $insertQuery = $conn->prepare("INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (?, ?, ?, ?)");
    $insertQuery->bind_param("dddd", $height, $weight, $bmi, $advice);

    if (!$insertQuery->execute()) {
      die("Error: " . $insertQuery->error);
    }

    $insertQuery->close();
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>BMI Calculator - Jewelry Website</title>
    <style>
        body { font-family: Arial, sans-serif; }
    </style>
</head>
<body>
    <h1>BMI Calculator</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="height">Height (cm):</label><br>
        <input type="number" id="height" name="height" required><br>

        <label for="weight">Weight (kg):</label><br>
        <input type="number" id="weight" name="weight" required><br><br>

        <input type="submit" value="Calculate BMI">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h2>Your Result:</h2>";
        echo "<p>Your BMI is: $bmi</p>";
        echo "<p>Health Status: $advice</p>";
    }
    ?>
</body>
</html>
