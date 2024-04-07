<?php
// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['height']) && isset($_POST['weight'])) {
    // Connect to the database
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert user data into database
    $height = $conn->real_escape_string($_POST['height']);
    $weight = $conn->real_escape_string($_POST['weight']);
    $sql = "INSERT INTO bmi_records (height, weight) VALUES ('$height', '$weight')";

    if (!$conn->query($sql) === TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Calculate BMI
    $heightInMeters = $height / 100;
    $bmi = $weight / ($heightInMeters * $heightInMeters);

    // Determine health recommendation
    if ($bmi <= 18.5) {
        $recommendation = "Underweight - Good to have a nutritious diet.";
    } elseif ($bmi > 18.5 && $bmi <= 24.9) {
        $recommendation = "Normal weight - Keep up the good work!";
    } elseif ($bmi >= 25 && $bmi <= 29.9) {
        $recommendation = "Overweight - A balanced diet and regular exercise are recommended.";
    } else {
        $recommendation = "Obese - It's important to consult a healthcare provider for a suitable weight loss plan.";
    }

    $conn->close();
} else {
    $bmi = "";
    $recommendation = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BMI Calculator</title>
</head>
<body>
    <h1>BMI Calculator and Health Recommendations</h1>
    <form method="post">
        <label for="height">Height (cm):</label>
        <input type="number" id="height" name="height" required>
        <label for="weight">Weight (kg):</label>
        <input type="number" id="weight" name="weight" required>
        <button type="submit">Calculate BMI</button>
    </form>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <p>Your BMI: <?php echo round($bmi, 2); ?></p>
        <p>Health Recommendation: <?php echo $recommendation; ?></p>
    <?php endif; ?>
</body>
</html>
