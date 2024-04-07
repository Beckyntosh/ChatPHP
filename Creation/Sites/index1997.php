<?php

$host = "db";
$db_user = "root";
$db_pass = "root";
$db_name = "my_database";

// Connecting to database
$conn = new mysqli($host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS retirement_savings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
current_age INT(3) NOT NULL,
retirement_age INT(3) NOT NULL,
monthly_income FLOAT NOT NULL,
savings_target FLOAT NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $current_age = $_POST['current_age'];
  $retirement_age = $_POST['retirement_age'];
  $monthly_income = $_POST['monthly_income'];
  $lifestyle_factor = $_POST['lifestyle_factor']; // Multiplier based on lifestyle preferences

  // Calculate savings target
  $years_to_save = $retirement_age - $current_age;
  $savings_target = ($monthly_income * $lifestyle_factor) * $years_to_save * 12; // Simplified calculation

  // Insert data into the database
  $stmt = $conn->prepare("INSERT INTO retirement_savings (current_age, retirement_age, monthly_income, savings_target) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("iiif", $current_age, $retirement_age, $monthly_income, $savings_target);

  if ($stmt->execute()) {
    echo "<p>Calculation saved!</p>";
  } else {
    echo "<p>Error saving calculation: " . $conn->error . "</p>";
  }

  $stmt->close();
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Retirement Savings Calculator</title>
</head>
<body>
    <h2>Retirement Savings Calculator</h2>
    <form method="post" action="">
        <label for="current_age">Current Age:</label><br>
        <input type="number" id="current_age" name="current_age" required><br>
        <label for="retirement_age">Desired Retirement Age:</label><br>
        <input type="number" id="retirement_age" name="retirement_age" required><br>
        <label for="monthly_income">Monthly Income ($):</label><br>
        <input type="number" id="monthly_income" name="monthly_income" step="0.01" required><br>
        <label for="lifestyle_factor">Lifestyle Factor (1.2 = Moderate, 1.4 = Comfortable, 1.6 = Luxury):</label><br>
        <input type="number" id="lifestyle_factor" name="lifestyle_factor" step="0.01" min="1.2" max="1.6" required><br>
        <input type="submit" value="Calculate">
    </form>
</body>
</html>
