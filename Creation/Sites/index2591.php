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

// Create table for storing BMI records if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS bmi_records (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    height DECIMAL(5,2),
    weight DECIMAL(5,2),
    bmi DECIMAL(5,2),
    advice VARCHAR(255),
    reg_date TIMESTAMP
    )";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

function calculateBMI($height, $weight){
    $heightInMeters = $height * 0.0254;
    return $weight / pow($heightInMeters, 2);
}

function getHealthAdvice($bmi){
    if     ($bmi <= 18.5) return "Underweight - Eat more, increase calorie intake.";
    elseif ($bmi > 18.5 && $bmi <= 24.9) return "Normal weight - Maintain your current diet and exercise.";
    elseif ($bmi > 25 && $bmi <= 29.9) return "Overweight - Exercise more, consider diet adjustment.";
    else return "Obesity - Seek professional health advice.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect value of input field
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $bmi = calculateBMI($height, $weight);
    $advice = getHealthAdvice($bmi);

    $stmt = $conn->prepare("INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ddds", $height, $weight, $bmi, $advice);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully. BMI: $bmi. Advice: $advice";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>BMI Calculator</title>
</head>
<body>
    <h2>BMI Calculator</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        Height (inches): <input type="number" step="0.01" name="height">
        Weight (pounds): <input type="number" step="0.01" name="weight">
        <input type="submit">
    </form>
</body>
</html>
