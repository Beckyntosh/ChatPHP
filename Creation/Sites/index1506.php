<?php
$serverName = "db";
$username = "root";
$password = "root";
$dbName = "my_database";

// Create connection
$conn = new mysqli($serverName, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$tableQuery = "CREATE TABLE IF NOT EXISTS clients (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  contact_email VARCHAR(255),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($tableQuery)) {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['email'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];

  $stmt = $conn->prepare("INSERT INTO clients (name, contact_email) VALUES (?, ?)");
  $stmt->bind_param("ss", $name, $email);

  if($stmt->execute()) {
    echo "<script>alert('Client added successfully!');</script>";
  } else {
    echo "<script>alert('Error adding client: " . $stmt->error . "');</script>";
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Add New Client to CRM</title>
<style>
    body{font-family: Arial, sans-serif; background-color: #f0f0f0;}
    .container{ max-width: 600px; margin: 50px auto; background: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
    form{display: flex; flex-direction: column;}
    label{margin-top: 10px;}
    input[type="text"], input[type="email"]{padding: 10px; margin-top: 5px; border-radius: 5px; border: 1px solid #ddd; font-size: 16px;}
    input[type="submit"]{ background: #333; color: #fff; padding: 10px; margin-top: 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;}
    input[type="submit"]:hover{ background: #555; }
</style>
</head>
<body>

<div class="container">
<h2>Add New Client</h2>
<form action="" method="post">
  <label for="name">Client Name:</label>
  <input type="text" id="name" name="name" required>

  <label for="email">Contact Email:</label>
  <input type="email" id="email" name="email" required>
  
  <input type="submit" value="Add Client">
</form>
</div>

</body>
</html>
