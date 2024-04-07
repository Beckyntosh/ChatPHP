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

// Create expense table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(50),
    amount DECIMAL(10, 2),
    description VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $category = $_POST['category'];
  $amount = $_POST['amount'];
  $description = $_POST['description'];

  $stmt = $conn->prepare("INSERT INTO expenses (category, amount, description) VALUES (?, ?, ?)");
  $stmt->bind_param("sds", $category, $amount, $description);

  if ($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $stmt . "<br>" . $conn->error;
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
<form action="" method="post">
  <label for="category">Category:</label>
  <select name="category" id="category">
    <option value="Food">Food</option>
    <option value="Prescriptions">Prescriptions</option>
    <option value="Utilities">Utilities</option>
    <option value="Other">Other</option>
  </select><br><br>
  
  <label for="amount">Amount ($):</label>
  <input type="number" id="amount" name="amount" step="0.01"><br><br>
  
  <label for="description">Description:</label>
  <textarea id="description" name="description"></textarea><br><br>
  
  <input type="submit" value="Submit">
</form>
</body>
</html>
