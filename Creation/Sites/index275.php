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

// Create expenses table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(30) NOT NULL,
amount DECIMAL(10, 2) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle the POST request from the form
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['category']) && isset($_POST['amount'])) {
    $category = $_POST['category'];
    $amount = $_POST['amount'];
    
    $stmt = $conn->prepare("INSERT INTO expenses (category, amount) VALUES (?, ?)");
    $stmt->bind_param("sd", $category, $amount);
    $stmt->execute();
    
    echo "New expense added successfully!";
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
<form method="POST">
    <label for="category">Category:</label><br>
    <input type="text" id="category" name="category" required><br>
    <label for="amount">Amount:</label><br>
    <input type="number" step="0.01" id="amount" name="amount" required><br><br>
    <input type="submit" value="Add Expense">
</form>
</body>
</html>
