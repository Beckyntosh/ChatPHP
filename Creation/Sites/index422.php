<?php
// Connection Parameters
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

// Check if the table exists, if not create one
$tableCheckQuery = "SHOW TABLES LIKE 'bmi_records'";
$result = mysqli_query($conn, $tableCheckQuery);
if (mysqli_num_rows($result) == 0) {
  $sql = "CREATE TABLE bmi_records (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  height FLOAT NOT NULL,
  weight FLOAT NOT NULL,
  bmi_result FLOAT NOT NULL,
  recommendation VARCHAR(255) NOT NULL,
  reg_date TIMESTAMP
  )";

  if ($conn->query($sql) === TRUE) {
    echo "Table bmi_records created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }
}

$bmiResult = '';
$healthAdvice = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $height = isset($_POST['height']) ? floatval($_POST['height']) : 0;
    $weight = isset($_POST['weight']) ? floatval($_POST['weight']) : 0;

    if ($height > 0 && $weight > 0) {
        $heightInMeters = $height * 0.0254; // assuming height was entered in inches
        $bmi = $weight / ($heightInMeters * $heightInMeters);
        $bmiResult = round($bmi, 2);

        if ($bmi < 18.5) {
            $healthAdvice = 'Underweight - Eat more.';
        } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
            $healthAdvice = 'Normal weight - Keep up the good work!';
        } elseif ($bmi >= 25 && $bmi <= 29.9) {
            $healthAdvice = 'Overweight - Consider a diet and exercise.';
        } elseif ($bmi >= 30) {
            $healthAdvice = 'Obesity - Seek medical attention.';
        }

        // Save to Database
        $stmt = $conn->prepare("INSERT INTO bmi_records (height, weight, bmi_result, recommendation) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ddfs", $height, $weight, $bmiResult, $healthAdvice);
        $stmt->execute();
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gardening Tools BMI Calculator</title>
</head>
<body>
    <h1>Gardening Tools - BMI Calculator</h1>
    <form action="" method="post">
        Height (in inches): <input type="number" name="height" min="0" step="any" required><br>
        Weight (in pounds): <input type="number" name="weight" min="0" step="any" required><br>
        <input type="submit" value="Calculate BMI">
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
        <h2>BMI Result: <?php echo $bmiResult; ?></h2>
        <p><strong>Health Advice:</strong> <?php echo $healthAdvice; ?></p>
    <?php endif; ?>
</body>
</html>