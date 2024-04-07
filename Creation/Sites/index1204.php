<?php

// Define MySQL connection parameters
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

// Create expenses table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(30) NOT NULL,
amount DECIMAL(10, 2) NOT NULL,
expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $category = $_POST["category"];
  $amount = $_POST["amount"];

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
<html>
<head>
    <title>Add Expense</title>
</head>
<body>

<h2>Add Expense to Personal Budget</h2>

<form method="post">
    <label for="category">Category:</label><br>
    <select name="category" id="category">
        <option value="Food">Food</option>
        <option value="Wines">Wines</option>
        <option value="Utilities">Utilities</option>
        <option value="Entertainment">Entertainment</option>
Add more categories as needed
    </select><br>
    <label for="amount">Amount: $</label><br>
    <input type="number" id="amount" name="amount" min="0" step="any">
    <br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
