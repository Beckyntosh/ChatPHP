<?php

// Connection variables
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

// Create table for storing BMI results if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS bmi_results (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
height VARCHAR(30) NOT NULL,
weight VARCHAR(30) NOT NULL,
bmi FLOAT NOT NULL,
advice VARCHAR(255) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo ""; // Silent creation
} else {
    echo "Error creating table: " . $conn->error;
}

$bmi = $advice = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $height = $_POST['height'];
    $weight = $_POST['weight'];

    // Calculate BMI
    $bmi = ($weight / ($height * $height)) * 10000;

    // Determine health advice
    if ($bmi < 18.5) {
        $advice = "Underweight: Eat more frequently and choose nutrient-rich foods.";
    } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
        $advice = "Normal: Keep up the good work! Balanced diet and regular exercise are key.";
    } elseif ($bmi >= 25 && $bmi <= 29.9) {
        $advice = "Overweight: Exercise regularly and watch your calorie intake.";
    } else {
        $advice = "Obesity: Consult a healthcare provider for a suitable weight loss program.";
    }

    // Save result to database
    $stmt = $conn->prepare("INSERT INTO bmi_results (height, weight, bmi, advice) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $height, $weight, $bmi, $advice);
    $stmt->execute();
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BMI Calculator</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 30%; margin: auto; padding-top: 20px; }
        input[type='number'], button { padding: 10px; }
        button { background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        button:hover { opacity: 0.8; }
    </style>
</head>
<body>
<div class="container">
    <h2>BMI Calculator</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="height">Height (cm):</label><br>
        <input type="number" id="height" name="height" required><br><br>
        <label for="weight">Weight (kg):</label><br>
        <input type="number" id="weight" name="weight" required><br><br>
        <button type="submit">Calculate BMI</button>
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h4>Your BMI is: " . round($bmi, 2) . "</h4>";
        echo "<p>" . $advice . "</p>";
    }
    ?>
</div>
</body>
</html>
