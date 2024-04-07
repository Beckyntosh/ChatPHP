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
$table_sql = "CREATE TABLE IF NOT EXISTS expenses (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  category VARCHAR(30) NOT NULL,
  amount DECIMAL(10, 2) NOT NULL,
  expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $category = $_POST["category"];
  $amount = $_POST["amount"];

  $insert_sql = $conn->prepare("INSERT INTO expenses (category, amount) VALUES (?, ?)");
  $insert_sql->bind_param("sd", $category, $amount);

  if ($insert_sql->execute() === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $insert_sql->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Expense</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    padding: 20px;
  }
  .container {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 5px;
  }
  label, input {
    display: block;
    margin-bottom: 10px;
  }
  input[type=text], input[type=number] {
    width: 100%;
    padding: 8px;
    border: 1px solid #cccccc;
    border-radius: 4px;
  }
  input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
</style>
</head>
<body>

<div class="container">
  <h2>Add Expense</h2>
  <form action="" method="post">
    <label for="category">Category:</label>
    <input type="text" id="category" name="category" required>
    <label for="amount">Amount:</label>
    <input type="number" id="amount" name="amount" step="0.01" required>
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>
