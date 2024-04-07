<?php
// Initialize variables to avoid errors
$height = $weight = $bmi = $health = "";
$heightErr = $weightErr = "";

// Establish database connection
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

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS BMIData (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  height FLOAT NOT NULL,
  weight FLOAT NOT NULL,
  bmi FLOAT NOT NULL,
  health VARCHAR(30) NOT NULL,
  reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $isValid = true;

  if (empty($_POST["height"])) {
    $heightErr = "Height is required";
    $isValid = false;
  } else {
    $height = test_input($_POST["height"]);
  }

  if (empty($_POST["weight"])) {
    $weightErr = "Weight is required";
    $isValid = false;
  } else {
    $weight = test_input($_POST["weight"]);
  }

  if ($isValid) {
    $bmi = calculateBMI($height, $weight);
    $health = healthRecommendation($bmi);

    // Insert data into database
    $stmt = $conn->prepare("INSERT INTO BMIData (height, weight, bmi, health) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("fffs", $height, $weight, $bmi, $health);

    if (!$stmt->execute()) {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
  }
}

$conn->close();

function calculateBMI($height, $weight) {
  $heightMeters = $height * 0.0254;
  return $weight / ($heightMeters * $heightMeters);
}

function healthRecommendation($bmi) {
  if ($bmi < 18.5) {
    return "Underweight";
  } elseif ($bmi >= 18.5 && $bmi < 25) {
    return "Normal weight";
  } elseif ($bmi >= 25 && $bmi < 30) {
    return "Overweight";
  } else {
    return "Obesity";
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>BMI Calculator</title>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>
    <h2>BMI Calculator</h2>
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Height (in inches): <input type="text" name="height" value="<?php echo $height;?>">
        <span class="error">* <?php echo $heightErr;?></span>
        <br><br>
        Weight (in pounds): <input type="text" name="weight" value="<?php echo $weight;?>">
        <span class="error">* <?php echo $weightErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Calculate BMI">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $isValid) {
        echo "<h2>Your BMI Result:</h2>";
        echo "Height: " . $height . " inches<br>";
        echo "Weight: " . $weight . " pounds<br>";
        echo "BMI: " . number_format($bmi, 2) . "<br>";
        echo "Health Status: " . $health . "<br>";
    }
    ?>

</body>
</html>
