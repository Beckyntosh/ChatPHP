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

// Check if table exists, if not create it
$tableCheckQuery = "SHOW TABLES LIKE 'bmi_records'";
$result = $conn->query($tableCheckQuery);

if($result->num_rows == 0) {
    $createTableQuery = "CREATE TABLE bmi_records (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    height DECIMAL(5,2),
    weight DECIMAL(5,2),
    bmi DECIMAL(5,2),
    advice VARCHAR(256),
    reg_date TIMESTAMP
    )";
    if ($conn->query($createTableQuery) !== TRUE) {
        die("Error creating table: " . $conn->error);
    }
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $height = floatval($_POST['height']);
    $weight = floatval($_POST['weight']);
    if($height > 0 && $weight > 0) {
        $heightInMeter = $height * 0.0254;
        $bmi = $weight / ($heightInMeter * $heightInMeter);
        $bmi = round($bmi, 2);

        $advice = '';
        if($bmi < 18.5) {
            $advice = 'Underweight - Eat more and exercise.';
        } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
            $advice = 'Normal weight - Keep up the good work!';
        } elseif ($bmi >= 25 && $bmi <= 29.9) {
            $advice = 'Overweight - Exercise more and watch your diet.';
        } else {
            $advice = 'Obese - Seek medical advice, exercise more and adjust your diet.';
        }

        $insertSQL = "INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insertSQL);
        $stmt->bind_param("ddds", $height, $weight, $bmi, $advice);
        $stmt->execute();

        $message = "Your BMI is " . $bmi . ". " . $advice;
    } else {
        $message = "Please enter a valid height and weight.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>BMI Calculator</title>
</head>
<body>
<h2>BMI Calculator</h2>
<form method="post" action="">
    Height (in inches): <input type="number" step="0.01" name="height" required><br>
    Weight (in pounds): <input type="number" step="0.01" name="weight" required><br>
    <input type="submit" value="Calculate BMI">
</form>

<?php if($message != ''): ?>
<p><?php echo $message; ?></p>
<?php endif; ?>
</body>
</html>

<?php
$conn->close();
?>
