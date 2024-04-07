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

// Create table BMIRecords if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS BMIRecords (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    height FLOAT NOT NULL,
    weight FLOAT NOT NULL,
    bmi FLOAT,
    advice TEXT,
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

$bmi = $advice = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    if ($height > 0 && $weight > 0) {
        $heightInMeters = $height * 0.0254;
        $bmi = $weight / ($heightInMeters * $heightInMeters);
        $roundedBmi = round($bmi, 2);

        if ($bmi < 18.5) {
            $advice = "Underweight - Eat more, nutrient-rich foods.";
        } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
            $advice = "Normal weight - Keep up the good work!";
        } elseif ($bmi >= 25 && $bmi <= 29.9) {
            $advice = "Overweight - Exercise more and watch your diet.";
        } else {
            $advice = "Obesity - Seek medical advice for a suitable diet and exercise plan.";
        }

        // Insert data into database
        $stmt = $conn->prepare("INSERT INTO BMIRecords (height, weight, bmi, advice) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("fffs", $height, $weight, $roundedBmi, $advice);
        $stmt->execute();
    }
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
        .form-group { margin-bottom: 1em; }
        label, input { display: block; }
        input[type="number"] { width: 100%; box-sizing: border-box; }
        input[type="submit"] { padding: 10px 15px; }
    </style>
</head>
<body>

<h2>BMI Calculator</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="form-group">
        <label for="height">Height (inches):</label>
        <input type="number" id="height" name="height" required>
    </div>
    <div class="form-group">
        <label for="weight">Weight (pounds):</label>
        <input type="number" id="weight" name="weight" required>
    </div>
    <input type="submit" value="Calculate BMI">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h3>Your BMI is: " . $roundedBmi . "</h3>";
    echo "<p>" . $advice . "</p>";
}
?>

</body>
</html>