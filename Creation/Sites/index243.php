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

// Create Expenses Table
$expensesTableSql = "CREATE TABLE IF NOT EXISTS expenses (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  category VARCHAR(30) NOT NULL,
  amount DECIMAL(10, 2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($expensesTableSql)) {
  echo "Error creating table: " . $conn->error;
}

// Handle Post Request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $category = $_POST['category'] ?? '';
  $amount = $_POST['amount'] ?? 0;
  
  $stmt = $conn->prepare("INSERT INTO expenses (category, amount) VALUES (?, ?)");
  $stmt->bind_param("sd", $category, $amount);

  if ($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $stmt->error;
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
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; padding: 20px;}
        form { background-color: #fff; padding: 20px; border-radius: 5px; }
        input, select { padding: 10px; margin: 10px 0; width: 100%; box-sizing: border-box; }
        input[type=submit] { background-color: #007bff; color: #ffffff; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Add Expense to Personal Budget</h2>
    <form action="" method="post">
        <label for="category">Category:</label>
        <select name="category" id="category" required>
            <option value="Food">Food</option>
            <option value="Office Supplies">Office Supplies</option>
            <option value="Utilities">Utilities</option>
            <option value="Transportation">Transportation</option>
            <option value="Miscellaneous">Miscellaneous</option>
        </select>

        <label for="amount">Amount:</label>
        <input type="number" step="0.01" name="amount" id="amount" required>

        <input type="submit" value="Add Expense">
    </form>
</body>
</html>
