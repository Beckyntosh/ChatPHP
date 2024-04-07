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

// Create Expenses Table
$expensesTable = "CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(30) NOT NULL,
amount DECIMAL(10,2) NOT NULL,
expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($expensesTable) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $category = $_POST['category'];
  $amount = $_POST['amount'];

  // Insert expense into database
  $sql = "INSERT INTO expenses (category, amount) VALUES (?, ?)";

  $stmt = $conn->prepare($sql);
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
<title>Add Expense to Personal Budget</title>
<style>
    body { font-family: Arial, sans-serif; }
    .container { max-width: 600px; margin: auto; padding: 20px; }
    input[type="text"], input[type="number"], select { width: 100%; padding: 10px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
    input[type="submit"] { width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer; }
    input[type="submit"]:hover { background-color: #45a049; }
</style>
</head>
<body>
<div class="container">
  <h2>Add Expense</h2>
  <form action="" method="post">
    <label for="category">Category</label>
    <select id="category" name="category">
      <option value="Food">Food</option>
      <option value="Gardening Tools">Gardening Tools</option>
      <option value="Utilities">Utilities</option>
      <option value="Other">Other</option>
    </select>
    <label for="amount">Amount ($)</label>
    <input type="number" id="amount" name="amount" step="0.01" required>
    <input type="submit" value="Add Expense">
  </form>
</div>
</body>
</html>
