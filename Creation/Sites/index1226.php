<?php

// Establish MySQL connection
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

// Create expenses table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(30) NOT NULL,
amount DECIMAL(10,2) NOT NULL,
expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  die("Error creating table: " . $conn->error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['amount']) && isset($_POST['category'])) {
  $amount = $_POST['amount'];
  $category = $_POST['category'];
  
  $stmt = $conn->prepare("INSERT INTO expenses (category, amount) VALUES (?, ?)");
  $stmt->bind_param("sd", $category, $amount);
  
  if ($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $stmt->close();
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
  body{font-family: Arial, sans-serif; margin: 20px; padding: 20px;}
  form{margin-top: 20px;}
</style>
</head>
<body>

<h2>Add Expense to Personal Budget</h2>

<form action="" method="post">
  <label for="category">Category:</label><br>
  <select name="category" id="category" required>
    <option value="Food">Food</option>
    <option value="Musical Instruments">Musical Instruments</option>
    <option value="Utilities">Utilities</option>
    <option value="Entertainment">Entertainment</option>
    <option value="Miscellaneous">Miscellaneous</option>
  </select><br>
  <label for="amount">Amount: $</label><br>
  <input type="text" id="amount" name="amount" pattern="\d+(\.\d{2})?" required><br><br>
  <input type="submit" value="Add Expense">
</form>

</body>
</html>
