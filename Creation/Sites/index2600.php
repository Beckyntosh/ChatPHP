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
$tableCheck = $conn->query("SHOW TABLES LIKE 'bmiCalculations'");
if ($tableCheck->num_rows == 0) {
  // SQL to create table
  $sql = "CREATE TABLE bmiCalculations (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  height FLOAT NOT NULL,
  weight FLOAT NOT NULL,
  bmi FLOAT NOT NULL,
  advice VARCHAR(255),
  reg_date TIMESTAMP
  )";

  if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
  }
}

$height = $weight = $bmi = $advice = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $height = test_input($_POST["height"]);
  $weight = test_input($_POST["weight"]);
  $bmi = $weight / ($height * $height);

  if ($bmi <= 18.5) {
    $advice = "Underweight";
  } elseif ($bmi > 18.5 && $bmi <= 24.9) {
    $advice = "Normal weight";
  } elseif ($bmi >= 25 && $bmi <= 29.9) {
    $advice = "Overweight";
  } else {
    $advice = "Obesity";
  }
  
  $stmt = $conn->prepare("INSERT INTO bmiCalculations (height, weight, bmi, advice) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ddds", $height, $weight, $bmi, $advice);
  $stmt->execute();
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BMI Calculator - Sherlock's Health Advice</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f5f5dc;
        }
        .container {
            width: 50%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .result {
            background-color: #f0f0f0;
            padding: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Enter Your Height and Weight</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="height">Height (m):</label><br>
            <input type="number" step="0.01" id="height" name="height" required><br>
            <label for="weight">Weight (kg):</label><br>
            <input type="number" step="0.1" id="weight" name="weight" required><br><br>
            <input type="submit" value="Calculate BMI">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<div class='result'><strong>Result:</strong> Your BMI is " . number_format($bmi, 2) . ". Based on the calculation, you are considered: " . $advice . ".</div>";
        }
        ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
