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
$sql = "CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(30) NOT NULL,
amount DECIMAL(10, 2) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert data from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $category = $_POST["category"];
  $amount = $_POST["amount"];
  
  $sql = "INSERT INTO expenses (category, amount)
  VALUES ('$category', '$amount')";
  
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Expense to Personal Budget</title>
</head>
<body>

<h2>Add Expense</h2>

<form method="post">
  <label for="category">Category:</label><br>
  <input type="text" id="category" name="category"><br>
  <label for="amount">Amount ($):</label><br>
  <input type="text" id="amount" name="amount"><br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
