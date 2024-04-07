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

// Create table if not exists
$table_sql = "CREATE TABLE IF NOT EXISTS plants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plant_name VARCHAR(50) NOT NULL,
    care_schedule VARCHAR(100) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
  //echo "Table Plants created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $plant_name = $_POST['plant_name'];
  $care_schedule = $_POST['care_schedule'];

  $sql = "INSERT INTO plants (plant_name, care_schedule) VALUES ('$plant_name', '$care_schedule')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
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
    <title>Add a Plant to Your Garden</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f8ff;
            color: #333;
            text-align: center;
        }
        form {
            margin-top: 20px;
        }
        input[type=text], input[type=submit] {
            padding: 10px;
            margin: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>

<h2>Add a Plant to Your Garden Tracker</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="plant_name">Plant Name:</label><br>
  <input type="text" id="plant_name" name="plant_name" required><br>
  <label for="care_schedule">Care Schedule:</label><br>
  <input type="text" id="care_schedule" name="care_schedule" required><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>
