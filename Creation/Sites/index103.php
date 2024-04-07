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

// Creating the Expenses table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS Expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(30) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    expense_date DATE NOT NULL,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Inserting a new expense if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $category = $_POST['category'];
  $amount = $_POST['amount'];
  $expense_date = $_POST['expense_date'];

  $stmt = $conn->prepare("INSERT INTO Expenses (category, amount, expense_date) VALUES (?, ?, ?)");
  $stmt->bind_param("sds", $category, $amount, $expense_date);

  if ($stmt->execute() === TRUE) {
    echo "<p>Expense added successfully!</p>";
  } else {
    echo "<p>Error adding expense: " . $conn->error . "</p>";
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
</head>
<body>
    <h1>Add Expense to Personal Budget</h1>
    <form method="post" action="">
        <label for="category">Category:</label>
        <select name="category" id="category" required>
            <option value="Furniture">Furniture</option>
            <option value="Decor">Decor</option>
            <option value="Improvements">Improvements</option>
            <option value="Maintenance">Maintenance</option>
        </select>
        <br>
        <label for="amount">Amount:</label>
        <input type="number" step="0.01" name="amount" id="amount" required>
        <br>
        <label for="expense_date">Date of Expense:</label>
        <input type="date" name="expense_date" id="expense_date" required>
        <br>
        <input type="submit" value="Add Expense">
    </form>
</body>
</html>