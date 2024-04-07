// PARAMETERS: Function: Body Mass Index (BMI) Calculator: "Determine BMI by entering height and weight, and provide health recommendations. Example: User enters their height and weight to calculate BMI and receive health advice Product: Bedding Style: modular
<?php
// Check if form was submitted:
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['height']) && isset($_POST['weight'])) {
    // Connect to the database
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

    // Clean data
    $height = $conn->real_escape_string($_POST['height']);
    $weight = $conn->real_escape_string($_POST['weight']);
    
    // Calculate BMI
    $heightInMeters = $height / 100;
    $bmi = $weight / ($heightInMeters * $heightInMeters);
    $bmi = round($bmi, 1);

    // Basic health recommendation
    $healthStatus = '';
    if ($bmi < 18.5) {
        $healthStatus = 'Underweight';
    } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
        $healthStatus = 'Normal weight';
    } elseif ($bmi >= 25 && $bmi <= 29.9) {
        $healthStatus = 'Overweight';
    } else {
        $healthStatus = 'Obesity';
    }

    // Save to database (Example table 'bmi_records', make sure to create it.)
    $sql = "INSERT INTO bmi_records (height, weight, bmi, health_status) VALUES ('$height', '$weight', '$bmi','$healthStatus')";

    if (!$conn->query($sql) === TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $bmi = '';
    $healthStatus = '';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>BMI Calculator</title>
</head>
<body>
    <h1>BMI Calculator</h1>
    <form method="post">
        Height (cm): <input type="number" name="height" required><br>
        Weight (kg): <input type="number" name="weight" required><br>
        <input type="submit" value="Calculate BMI">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h2>Your Result:</h2>";
        echo "Your BMI is: " . $bmi . "<br>";
        echo "Health Status: " . $healthStatus . "<br>";
    }
    ?>
</body>
</html>
