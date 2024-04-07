// PARAMETERS: Function: Body Mass Index (BMI) Calculator: "Determine BMI by entering height and weight, and provide health recommendations. Example: User enters their height and weight to calculate BMI and receive health advice Product: Travel Style: interoperable
<?php
// Define MYSQL database credentials
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

// Attempt MySQL server connection
$mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Variables for storing errors & results
$errors = [];
$bmiResult = '';
$healthAdvice = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $height = $_POST['height'];
    $weight = $_POST['weight'];

    if (empty($height) || empty($weight)) {
        $errors[] = 'Please enter both height and weight.';
    } else if (!is_numeric($height) || !is_numeric($weight)) {
        $errors[] = 'Both height and weight must be numbers.';
    } else {
        // Calculate BMI
        $heightInMeters = $height / 100;
        $bmi = $weight / ($heightInMeters * $heightInMeters);
        $bmiResult = number_format($bmi, 2);

        // Determine health advice
        if ($bmi < 18.5) {
            $healthAdvice = 'Underweight - It is advisable to see a doctor or nutritionist for guidance.';
        } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
            $healthAdvice = 'Normal weight - Keep up the good work!';
        } elseif ($bmi >= 25 && $bmi <= 29.9) {
            $healthAdvice = 'Overweight - A healthier diet and more exercise are advised.';
        } else {
            $healthAdvice = 'Obesity - It is advisable to see a doctor for guidance.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BMI Calculator</title>
<style>
    body { font-family: Arial, sans-serif; }
    .container { max-width: 600px; margin: 20px auto; padding: 20px; }
    input, button { padding: 10px; }
    .result { margin-top: 20px; }
    .error { color: red; }
</style>
</head>
<body>
<div class="container">
    <h2>BMI Calculator</h2>
    <form method="post">
        <div>
            <label for="height">Height (cm):</label>
            <input type="text" id="height" name="height" required>
        </div>
        <div>
            <label for="weight">Weight (kg):</label>
            <input type="text" id="weight" name="weight" required>
        </div>
        <button type="submit">Calculate BMI</button>
    </form>

    <div class="result">
        <?php if (!empty($errors)): ?>
            <div class="error"><?php echo implode('<br>', $errors); ?></div>
        <?php endif; ?>
        
        <?php if ($bmiResult): ?>
            <p>Your BMI is: <?php echo $bmiResult; ?></p>
            <p>Health advice: <?php echo $healthAdvice; ?></p>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
