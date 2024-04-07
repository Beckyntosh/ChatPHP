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

// Create clients table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
contact_email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// HTML and PHP for adding a client
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add New Client</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: black; color: #0F0; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        input[type=text], input[type=email] { width: 100%; padding: 12px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box; }
        button { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%; }
        button:hover { opacity: 0.8; }
    </style>
</head>
<body>
<div class="container">
    <h2>Add Client to CRM</h2>
    <form action="" method="post">
        <label for="cname">Client Name:</label>
        <input type="text" id="cname" name="cname" required>
        <label for="email">Contact Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit" name="addClient">Add Client</button>
    </form>
</div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addClient'])) {
    // Collect value of input field
    $name = $_POST['cname'];
    $email = $_POST['email'];
    
    // Prepared statement to insert into the clients table
    $stmt = $conn->prepare("INSERT INTO clients (name, contact_email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);
    
    if ($stmt->execute()) {
        echo "<p style='color:green;'>New client added successfully</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
    $stmt->close();
}
$conn->close();
