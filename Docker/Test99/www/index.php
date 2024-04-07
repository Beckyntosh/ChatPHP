// PARAMETERS: Function: Body Mass Index (BMI) Calculator: "Determine BMI by entering height and weight, and provide health recommendations. Example: User enters their height and weight to calculate BMI and receive health advice Product: Furniture Style: detailed
<?php
// Establish DB Connection
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

// Create table for BMI Results if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS bmi_results (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    height DECIMAL(5,2),
    weight DECIMAL(5,2),
    bmi DECIMAL(5,2),
    advice VARCHAR(255),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $height = $_POST['height'];
    $weight = $_POST['weight'];

    //Calculate BMI
    $bmi = $weight / (($height / 100) * ($height / 100));
    $advice = "";

    if ($bmi <= 18.5) {
        $advice = "Underweight - Eat more, exercise";
    } elseif ($bmi > 18.5 && $bmi <= 24.9) {
        $advice = "Normal - Keep it up!";
    } elseif ($bmi >= 25 && $bmi <= 29.9) {
        $advice = "Overweight - Exercise more!";
    } else {
        $advice = "Obese - Seek medical attention";
    }

    // Insert into db
    $stmt = $conn->prepare("INSERT INTO bmi_results (height, weight, bmi, advice) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("dddd", $height, $weight, $bmi, $advice);
    $stmt->execute();

    echo "BMI calculated successfully. <br> Your BMI: ".number_format($bmi, 2)." - ". $advice;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BMI Calculator</title>
    <style>
        body{font-family: Arial, sans-serif; margin: 0 auto; text-align: center; padding-top: 50px;}
        form{margin: 20px auto; width: 300px;}
        input[type=number], button{padding: 10px; margin: 5px; width: 90%;}
    </style>
</head>
<body>
    <h2>BMI Calculator</h2>
    <form action="" method="post">
        <input type="number" name="height" required min="50" placeholder="Height in cm (e.g. 170)" step="0.01"><br>
        <input type="number" name="weight" required min="20" placeholder="Weight in kg (e.g. 70)" step="0.01"><br>
        <button type="submit">Calculate BMI</button>
    </form>
</body>
</html>
