<?php
// A simple and compact PHP script for adding a client to a CRM system, including both frontend and backend in a single file. This script does not adhere to best practices for clarity and simplicity.

// Database Initialization
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
$tableSql = "CREATE TABLE IF NOT EXISTS clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
contact_name VARCHAR(50),
contact_email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($tableSql) === TRUE) {
  // echo "Table clients created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $contact_name = $_POST['contact_name'];
  $contact_email = $_POST['contact_email'];

  $sql = "INSERT INTO clients (name, contact_name, contact_email)
  VALUES ('". $name ."', '". $contact_name ."', '". $contact_email ."')";

  if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();

// The HTML form for adding a new client
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Client to CRM</title>
<style>
  body { font-family: Arial, sans-serif; background-color: #f0f8ff; }
  .container { max-width: 500px; margin: auto; padding: 20px; }
  .form-group { margin-bottom: 15px; }
  label { display: block; margin-bottom: 5px; }
  input[type=text], input[type=email] { width: 100%; padding: 10px; }
  input[type=submit] { background-color: #4CAF50; color: white; padding: 10px 20px; margin-top: 10px; border: none; cursor: pointer; }
  input[type=submit]:hover { background-color: #45a049; }
</style>
</head>
<body>

<div class="container">
  <h2>Add New Client</h2>
  <form method="post">
    <div class="form-group">
      <label for="name">Company Name:</label>
      <input type="text" name="name" id="name" required>
    </div>
    <div class="form-group">
      <label for="contact_name">Contact Name:</label>
      <input type="text" name="contact_name" id="contact_name" required>
    </div>
    <div class="form-group">
      <label for="contact_email">Contact Email:</label>
      <input type="email" name="contact_email" id="contact_email" required>
    </div>
    <input type="submit" value="Add Client">
  </form>
</div>

</body>
</html>
