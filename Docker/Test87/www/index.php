// PARAMETERS: Function: Body Mass Index (BMI) Calculator: "Determine BMI by entering height and weight, and provide health recommendations. Example: User enters their height and weight to calculate BMI and receive health advice Product: Vitamins Style: realistic
<?php
// Set a connection to the database
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

// Check if the table exists, if not, create it
$tableCheckSql = "SHOW TABLES LIKE 'bmi_records'";
$result = $conn->query($tableCheckSql);

if ($result->num_rows == 0) {
    $createTable = "CREATE TABLE bmi_records (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    height FLOAT NOT NULL,
    weight FLOAT NOT NULL,
    bmi_result FLOAT NOT NULL,
    advice TEXT NOT NULL,
    reg_date TIMESTAMP
    )";

    if ($conn->query($createTable) === TRUE) {
        echo "Table bmi_records created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Function to calculate BMI and get health advice
function calculateBMI($weight, $height) {
    $bmi = $weight / ($height * $height);
    $bmi = round($bmi, 1);
    
    if ($bmi < 18.5) {
        $advice = "Underweight: It's recommended to gain weight for better health.";
    } elseif ($bmi >= 18.5 && $bmi < 24.9) {
        $advice = "Normal weight: Keep up the good work for your health.";
    } elseif ($bmi >= 25 && $bmi < 29.9) {
        $advice = "Overweight: Consider a healthier diet and more physical activity.";
    } else {
        $advice = "Obese: Seek guidance for a healthier lifestyle.";
    }
    
    return array($bmi, $advice);
}

// Form submission logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    
    list($bmiResult, $advice) = calculateBMI($weight, $height);
    
    // Insert the data into the database
    $sql = "INSERT INTO bmi_records (height, weight, bmi_result, advice)
    VALUES ('$height', '$weight', '$bmiResult', '$advice')";

    if ($conn->query($sql) === TRUE) {
        echo "<h4>Your BMI is: " . $bmiResult . "</h4>";
        echo "<p>Health advice: " . $advice . "</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>BMI Calculator</title>
    <style>
        body{ font-family: Arial, sans-serif; }
        .container{ max-width: 600px; margin: auto; padding: 20px; }
        label, input { display: block; margin-bottom: 10px; }
    </style>
</head>
<body>

<div class="container">
    <h2>BMI Calculator</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="height">Height in meters:</label>
        <input type="text" id="height" name="height" required>

        <label for="weight">Weight in kilograms:</label>
        <input type="text" id="weight" name="weight" required>

        <input type="submit" value="Calculate BMI">
    </form>
</div>

</body>
</html>

<?php
$conn->close();
?>
