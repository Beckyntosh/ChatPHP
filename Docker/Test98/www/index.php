// PARAMETERS: Function: Body Mass Index (BMI) Calculator: "Determine BMI by entering height and weight, and provide health recommendations. Example: User enters their height and weight to calculate BMI and receive health advice Product: Organic Foods Style: protected
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

// Check if table exists, if not create one
$tableCheckQuery = "SHOW TABLES LIKE 'bmi_records'";
$result = $conn->query($tableCheckQuery);

if ($result->num_rows == 0) {
    $createTable = "CREATE TABLE bmi_records (
                        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        weight VARCHAR(30) NOT NULL,
                        height VARCHAR(30) NOT NULL,
                        bmi_result FLOAT(5,2) NOT NULL,
                        advice TEXT,
                        reg_date TIMESTAMP
                    )";

    if ($conn->query($createTable) === TRUE) {
        echo "Table bmi_records created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

$bmi = $advice = $height = $weight = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $height = $_POST["height"];
    $weight = $_POST["weight"];

    if (!empty($height) && !empty($weight)) {
        $bmi = $weight / ($height * $height);

        if ($bmi <= 18.5) {
            $advice = "Underweight - Eat more frequently, choose nutrient-rich foods.";
        } elseif ($bmi > 18.5 && $bmi <= 24.9) {
            $advice = "Healthy Weight - Keep up the good work!";
        } elseif ($bmi > 25 && $bmi <= 29.9) {
            $advice = "Overweight - Exercise regularly, monitor your diet.";
        } else {
            $advice = "Obesity - Seek professional medical advice.";
        }

        // Insert into database
        $stmt = $conn->prepare("INSERT INTO bmi_records (weight, height, bmi_result, advice) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssds", $weight, $height, $bmi, $advice);
        
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
</head>
<body>
    <h1>BMI Calculator</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Height (m): <input type="text" name="height" required><br>
        Weight (kg): <input type="text" name="weight" required><br>
        <input type="submit" name="submit" value="Calculate BMI">
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($bmi) && !empty($advice)) {
        echo "<h2>Your BMI is: " . number_format($bmi, 2) . "</h2>";
        echo "<p>" . $advice . "</p>";
    }
}
?>

</body>
</html>
