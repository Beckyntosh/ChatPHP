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
$sql = "CREATE TABLE IF NOT EXISTS clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
contact_name VARCHAR(30) NOT NULL,
contact_email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo ""; // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

function addClient($conn, $name, $contact_name, $contact_email) {
  $stmt = $conn->prepare("INSERT INTO clients (name, contact_name, contact_email) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $contact_name, $contact_email);
  
  if ($stmt->execute()) {
    echo "New client added successfully";
  } else {
    echo "Error: " . $stmt->error;
  }
  
  $stmt->close();
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $contact_name = $_POST['contact_name'];
  $contact_email = $_POST['contact_email'];
  
  // Validate input
  if (!empty($name) && !empty($contact_name) && !empty($contact_email)) {
    addClient($conn, $name, $contact_name, $contact_email);
  } else {
    echo "Please fill all the fields.";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Client to CRM System</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; }
        .container { width: 600px; margin: 50px auto; background: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        input[type=text], input[type=email] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; }
        input[type=submit] { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 10px 0; border: none; border-radius: 5px; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="container">
    <h2>Add Client</h2>
    <form method="POST">
        <label for="name">Client Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="contact_name">Contact Name:</label>
        <input type="text" id="contact_name" name="contact_name" required>
        
        <label for="contact_email">Contact Email:</label>
        <input type="email" id="contact_email" name="contact_email" required>
        
        <input type="submit" value="Add Client">
    </form>
</div>

</body>
</html>

<?php
$conn->close();
?>
