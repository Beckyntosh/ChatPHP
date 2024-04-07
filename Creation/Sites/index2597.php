<?php
// Initialize database connection
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

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $height = $_POST['height'];
    $weight = $_POST['weight'];

    if (!empty($height) && !empty($weight)) {
        $bmi = $weight / ($height * $height);

        $bmi = round($bmi, 1);
        $status = "";
        if ($bmi < 18.5) {
            $status = "Underweight";
        } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
            $status = "Normal weight";
        } elseif ($bmi >= 25 && $bmi <= 29.9) {
            $status = "Overweight";
        } else {
            $status = "Obesity";
        }

        // Insert into database
        $sql = "INSERT INTO bmi_records (height, weight, bmi, status) VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ddds", $height, $weight, $bmi, $status);

        if (!$stmt->execute()) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $result = "Your BMI is $bmi, indicating your weight is in the $status category.";
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BMI Calculator</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #fefefe; padding: 20px; }
        .container { max-width: 600px; margin: auto; }
    </style>
</head>
<body>
<div class="container">
    <h1>Body Mass Index (BMI) Calculator</h1>
    <form action="" method="post">
        <label for="height">Height in meters:</label><br>
        <input type="number" step="any" name="height" required><br><br>
        <label for="weight">Weight in kg:</label><br>
        <input type="number" step="any" name="weight" required><br><br>
        <input type="submit" value="Calculate BMI">
    </form>
    <?php if(isset($result)): ?>
        <p><?= $result ?></p>
    <?php endif; ?>
</div>
</body>
</html>
