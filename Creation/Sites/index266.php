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

// Create table if it doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(30) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
  // echo "Table expenses created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle post request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $category = $_POST['category'] ?? '';
  $amount = $_POST['amount'] ?? '';

  $stmt = $conn->prepare("INSERT INTO expenses (category, amount) VALUES (?, ?)");
  $stmt->bind_param("sd", $category, $amount);

  if ($stmt->execute()) {
    echo "<script>alert('Expense added successfully!');</script>";
  } else {
    echo "<script>alert('Error adding expense: " . htmlspecialchars($stmt->error) . "');</script>";
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Expense</title>
</head>
<body>

<h2>Add Expense to Personal Budget</h2>

<form action="" method="post">
  <label for="category">Category:</label><br>
  <select id="category" name="category">
    <option value="Food">Food</option>
    <option value="School Supplies">School Supplies</option>
    <option value="Utilities">Utilities</option>
    <option value="Others">Others</option>
  </select><br>
  <label for="amount">Amount:</label><br>
  <input type="number" id="amount" name="amount" step="0.01" required><br><br>
  <input type="submit" value="Add Expense">
</form>

</body>
</html>
