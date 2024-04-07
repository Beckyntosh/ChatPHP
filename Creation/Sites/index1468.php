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

// Create table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS finance_goals (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
goal_name VARCHAR(30) NOT NULL,
goal_amount DOUBLE NOT NULL,
creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table finance_goals created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $goal_name = $_POST["goal_name"];
    $goal_amount = $_POST["goal_amount"];

    $sql = "INSERT INTO finance_goals (goal_name, goal_amount)
    VALUES ('$goal_name', $goal_amount)";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create a Personal Finance Goal</title>
<style>
    body {
        font-family: 'Courier New', Courier, monospace;
        background-color: #f0f0f0;
        padding: 20px;
    }
    form {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 5px;
    }
    input[type=text], input[type=number] {
        width: 100%;
        padding: 10px;
        margin: 5px 0 20px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type=submit] {
        width: 100%;
        background-color: #4caf50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type=submit]:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>

<h2>Create a Personal Finance Goal</h2>

<form action="" method="post">
  <label for="goal_name">Goal Name:</label><br>
  <input type="text" id="goal_name" name="goal_name" value=""><br>
  <label for="goal_amount">Goal Amount ($):</label><br>
  <input type="number" id="goal_amount" name="goal_amount" value=""><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>

<?php
$conn->close();
?>
