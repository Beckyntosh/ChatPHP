<?php

define('MYSQL_ROOT_PSWD', 'root');
define('MYSQL_DB', 'my_database');
$servername = "db";
$username = "root";
$password = MYSQL_ROOT_PSWD;
$dbname = MYSQL_DB;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS calorie_intake (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
age INT(3) NOT NULL,
gender VARCHAR(10) NOT NULL,
weight FLOAT NOT NULL,
height FLOAT NOT NULL,
activity_level VARCHAR(30) NOT NULL,
calorie_intake FLOAT NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table calorie_intake created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

function calculateCalories($age, $gender, $weight, $height, $activity_level) {
    if($gender == 'male') {
        $bmr = 88.362 + (13.397 * $weight) + (4.799 * $height) - (5.677 * $age);
    } else {
        $bmr = 447.593 + (9.247 * $weight) + (3.098 * $height) - (4.330 * $age);
    }

    switch($activity_level) {
        case 'sedentary':
            return $bmr * 1.2;
        case 'lightly active':
            return $bmr * 1.375;
        case 'moderately active':
            return $bmr * 1.55;
        case 'very active':
            return $bmr * 1.725;
        case 'extra active':
            return $bmr * 1.9;
        default:
            return $bmr;
    }
}

$calories = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $weight = $_POST["weight"];
    $height = $_POST["height"];
    $activity_level = $_POST["activity_level"];

    $calories = calculateCalories($age, $gender, $weight, $height, $activity_level);

    $sql = "INSERT INTO calorie_intake (age, gender, weight, height, activity_level, calorie_intake)
    VALUES ('$age', '$gender', '$weight', '$height', '$activity_level', '$calories')";

    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calorie Intake Calculator</title>
</head>
<body>
    <h1>Calculate Your Daily Calorie Intake</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br><br>
        <label for="weight">Weight (kg):</label>
        <input type="number" id="weight" name="weight" step="0.01" required><br><br>
        <label for="height">Height (cm):</label>
        <input type="number" id="height" name="height" step="0.01" required><br><br>
        <label for="activity_level">Activity Level:</label>
        <select id="activity_level" name="activity_level" required>
            <option value="sedentary">Sedentary (little or no exercise)</option>
            <option value="lightly active">Lightly active (light exercise/sports 1-3 days/week)</option>
            <option value="moderately active">Moderately active (moderate exercise/sports 3-5 days/week)</option>
            <option value="very active">Very active (hard exercise/sports 6-7 days a week)</option>
            <option value="extra active">Extra active (very hard exercise/sports & physical job or 2x training)</option>
        </select><br><br>
        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h2>Your Daily Calorie Intake Should Be: " . number_format((float)$calories, 2, '.', '') . " calories</h2>";
    }
    ?>
</body>
</html>