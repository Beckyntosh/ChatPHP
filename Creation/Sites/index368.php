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
$table_sql = "CREATE TABLE IF NOT EXISTS wine_updates (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table_sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];

  // Prepare and bind
  $stmt = $conn->prepare("INSERT INTO wine_updates (email) VALUES (?)");
  $stmt->bind_param("s", $email);

  // Execute
  if ($stmt->execute()) {
    echo "Registered successfully for product updates.";
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
    <title>Sign Up for Wine Updates</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 400px; margin: 50px auto; padding: 20px; }
        input[type=email], button { width: 100%; padding: 10px; margin: 5px 0; }
    </style>
</head>
<body>

<div class="container">
    <h2>Sign up for Product Updates</h2>
    <form method="POST" action="">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Subscribe</button>
    </form>
</div>

</body>
</html>