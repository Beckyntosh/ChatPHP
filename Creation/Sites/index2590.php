<?php
// Define server connection parameters
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

// Check if table exists; if not, create it
$tableCheckQuery = "SHOW TABLES LIKE 'bmi_records'";
if ($conn->query($tableCheckQuery)->num_rows == 0) {
    $createTable = "CREATE TABLE bmi_records (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, height FLOAT NOT NULL, weight FLOAT NOT NULL, bmi FLOAT NOT NULL, advice VARCHAR(255), reg_date TIMESTAMP)";
    if (!$conn->query($createTable) === TRUE) {
      echo "Error creating table: " . $conn->error;
    }
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    if (!empty($height) && !empty($weight)) {
        $bmi = $weight / ($height * $height);
        
        if ($bmi <= 18.5) {
            $advice = "Your pet might be underweight. More snackies!";
        } elseif ($bmi > 18.5 && $bmi <= 24.9) {
            $advice = "Your pet is at a healthy weight. Perfect snuggle buddy!";
        } else {
            $advice = "Your pet might be overweight. Time for more zoomies!";
        }
        
        $sql = "INSERT INTO bmi_records (height, weight, bmi, advice) VALUES ('$height', '$weight', '$bmi', '$advice')";
        
        if ($conn->query($sql) === TRUE) {
            $message = "BMI calculated successfully! Advice: " . $advice;
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pet BMI Calculator</title>
</head>
<body>
<h2>Furry Friend BMI Calculator</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="height">Height (m):</label><br>
    <input type="text" id="height" name="height" required><br>
    <label for="weight">Weight (kg):</label><br>
    <input type="text" id="weight" name="weight" required><br><br>
    <input type="submit" value="Calculate BMI">
</form>

<?php
if (!empty($message)) {
    echo "<h3>" . $message . "</h3>";
}
?>

</body>
</html>
