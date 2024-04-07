<?php
// Connection to database
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

// Check if table exists, if not create it
$tableCheckQuery = "SHOW TABLES LIKE 'calorie_intakes'";
if ($conn->query($tableCheckQuery)->num_rows == 0) {
  $createTableQuery = "CREATE TABLE calorie_intakes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    age INT(3) NOT NULL,
    gender VARCHAR(20) NOT NULL,
    weight FLOAT NOT NULL,
    height INT(4) NOT NULL,
    activity_level VARCHAR(50) NOT NULL,
    recommended_calories INT(6),
    reg_date TIMESTAMP
    )";
  if ($conn->query($createTableQuery) === TRUE) {
    echo "Table `calorie_intakes` created successfully"; // In a real-world scenario, remove or log this.
  } else {
    echo "Error creating table: " . $conn->error;
  }
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $weight = $_POST['weight'];
  $height = $_POST['height'];
  $activity_level = $_POST['activity_level'];

  $recommended_calories = calculateCalories($age, $gender, $weight, $height, $activity_level);

  $stmt = $conn->prepare("INSERT INTO calorie_intakes (age, gender, weight, height, activity_level, recommended_calories) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssddsd", $age, $gender, $weight, $height, $activity_level, $recommended_calories);
  
  if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $stmt . "<br>" . $conn->error;
  }

  $stmt->close();
}

// Function to calculate calories
function calculateCalories($age, $gender, $weight, $height, $activity_level) {
  $bmr = 0;
  if ($gender == 'male') {
    $bmr = 10 * $weight + 6.25 * $height - 5 * $age + 5;
  } else if ($gender == 'female'){
    $bmr = 10 * $weight + 6.25 * $height - 5 * $age - 161;
  }

  switch ($activity_level) {
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

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calorie Intake Calculator</title>
</head>
<body>
    <h2>Calculate Your Daily Calorie Intake</h2>
    <form method="post">
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>
        <label>Gender:</label>
        <input type="radio" id="male" name="gender" value="male" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br><br>
        <label for="weight">Weight (kg):</label>
        <input type="number" id="weight" name="weight" step="0.1" required><br><br>
        <label for="height">Height (cm):</label>
        <input type="number" id="height" name="height" required><br><br>
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
</body>
</html>