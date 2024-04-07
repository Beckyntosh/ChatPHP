<?php
// Database connection
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS WaterIntakeRecords (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
weight FLOAT NOT NULL,
activity_level VARCHAR(30) NOT NULL,
suggested_intake FLOAT NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // echo "Table WaterIntakeRecords created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

function suggestIntake($weight, $activity_level) {
    if ($activity_level == "low") {
        return $weight * 30;
    } elseif ($activity_level == "medium") {
        return $weight * 35;
    } else { // high
        return $weight * 40;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $weight = $_POST["weight"];
    $activity_level = $_POST["activity_level"];
    
    $suggested_intake = suggestIntake($weight, $activity_level);
    
    $sql = "INSERT INTO WaterIntakeRecords (weight, activity_level, suggested_intake)
    VALUES ('$weight', '$activity_level', '$suggested_intake')";
    
    if ($conn->query($sql) === TRUE) {
      // Successfully inserted
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daily Water Intake Calculator</title>
    <style>
        body{ font-family: Arial, sans-serif; background: #f0f0f0; margin: 50px; }
        .container{ background: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        #result{ font-size: 1.5em; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daily Water Intake Calculator</h2>
        <form method="post">
            <label for="weight">Your Weight (in Kg):</label><br>
            <input type="number" id="weight" name="weight" required><br>
            <label for="activity_level">Activity Level:</label><br>
            <select id="activity_level" name="activity_level" required>
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select><br><br>
            <input type="submit" value="Submit">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<div id='result'>Suggested Daily Water Intake: " . round($suggested_intake, 2) . " ml</div>";
        }
        ?>
    </div>
</body>
</html>
<?php $conn->close(); ?>