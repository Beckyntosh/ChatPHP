<?php
// DB connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for custom orders if not exists
$table_sql = "CREATE TABLE IF NOT EXISTS custom_orders (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  customer_name VARCHAR(50) NOT NULL,
  email VARCHAR(50),
  details TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table_sql) !== TRUE) {
  die("Error creating table: " . $conn->error);
}

// Insert custom order
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $customer_name = $_POST['customer_name'];
  $email = $_POST['email'];
  $details = $_POST['details'];

  $insert_sql = $conn->prepare("INSERT INTO custom_orders (customer_name, email, details) VALUES (?, ?, ?)");
  $insert_sql->bind_param("sss", $customer_name, $email, $details);

  if ($insert_sql->execute() === TRUE) {
    echo "<p>Custom Order submitted successfully.</p>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $insert_sql->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Custom Order Form</title>
</head>
<body>
    <h2>Custom Order Request</h2>
    <form method="POST">
        <label for="customer_name">Name:</label><br>
        <input type="text" id="customer_name" name="customer_name" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="details">Order Details:</label><br>
        <textarea id="details" name="details" required></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>