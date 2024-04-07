// PARAMETERS: Function: Body Mass Index (BMI) Calculator: "Determine BMI by entering height and weight, and provide health recommendations. Example: User enters their height and weight to calculate BMI and receive health advice Product: Smartphones Style: cheerful
<?php
// Create connection
$conn = new mysqli('db', 'root', 'root', 'my_database');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS bmi_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    height FLOAT NOT NULL,
    weight FLOAT NOT NULL,
    bmi FLOAT NOT NULL,
    advice VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTable)) {
    echo "Error creating table: " . $conn->error;
}

$bmi = $advice = "";
$heightError = $weightError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["height"]) || empty($_POST["weight"])) {
        $heightError = "Height is required.";
        $weightError = "Weight is required.";
    } else {
        $height = $_POST["height"];
        $weight = $_POST["weight"];
        $bmi = $weight / ($height / 100) ** 2;
        if ($bmi <= 18.5) {
            $advice = "Underweight";
        } elseif ($bmi > 18.5 && $bmi <= 24.9) {
            $advice = "Normal weight";
        } elseif ($bmi >= 25 && $bmi <= 29.9) {
            $advice = "Overweight";
        } else {
            $advice = "Obesity";
        }
        $stmt = $conn->prepare("INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ddds", $height, $weight, $bmi, $advice);
        $stmt->execute();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BMI Calculator</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f8ff; }
        .container { max-width: 600px; margin: auto; padding: 20px; background: #ffffff; border-radius: 8px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="number"] { width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ddd; }
        input[type="submit"] { background: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        input[type="submit"]:hover { background: #45a049; }
        .error { color: red; }
        .advice { background: #90ee90; padding: 10px; margin-top: 20px; border-radius: 8px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h2>BMI Calculator</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="height">Height (cm):</label>
                <input type="number" id="height" name="height" required>
                <span class="error"><?php echo $heightError;?></span>
            </div>
            <div class="form-group">
                <label for="weight">Weight (kg):</label>
                <input type="number" id="weight" name="weight" required>
                <span class="error"><?php echo $weightError;?></span>
            </div>
            <input type="submit" value="Calculate BMI">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($bmi)) {
            echo "<p>Your BMI is: " . number_format($bmi, 2) . "</p>";
            echo "<div class='advice'>Health advice: " . $advice . "</div>";
        }
        ?>
    </div>
</body>
</html>
<?php
$conn->close();
?>
