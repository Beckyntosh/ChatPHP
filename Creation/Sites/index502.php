<?php
// Connect to the database
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

// Create tables if they do not exist
$sql = "CREATE TABLE IF NOT EXISTS plants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plant_name VARCHAR(30) NOT NULL,
    care_schedule VARCHAR(100) NOT NULL,
    reg_date TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
  //echo "Table 'plants' created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// handle the POST request to add a plant
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plant_name = $_POST['plant_name'];
    $care_schedule = $_POST['care_schedule'];

    $sql = "INSERT INTO plants (plant_name, care_schedule) VALUES ('$plant_name', '$care_schedule')";

    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('New plant successfully added!');</script>";
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
<title>Add a Plant to Gardening Tracker</title>
<style>
    body {font-family: Arial, sans-serif;}
    .container {max-width: 600px; margin: auto; padding: 20px;}
    form {display: flex; flex-direction: column;}
    label {margin: 10px 0 5px;}
    input, textarea, button {padding: 10px; margin-bottom: 20px; width: 100%; box-sizing: border-box;}
    button {background: #4CAF50; color: white; border: none; cursor: pointer;}
    button:hover {opacity: 0.8;}
</style>
</head>
<body>
<div class="container">
    <h2>Add a New Plant to Your Gardening Tracker</h2>
    <form action="" method="post">
        <label for="plant_name">Plant Name:</label>
        <input type="text" id="plant_name" name="plant_name" required>
        
        <label for="care_schedule">Care Schedule:</label>
        <textarea id="care_schedule" name="care_schedule" rows="4" required></textarea>
        
        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>
