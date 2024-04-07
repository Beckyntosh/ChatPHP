<?php
// Define database connection parameters
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'my_database');

// Establish a connection to the database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
$table = "CREATE TABLE IF NOT EXISTS clients (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            contact VARCHAR(50),
            reg_date TIMESTAMP
            )";

if (!$conn->query($table)) {
    echo "Error creating table: " . $conn->error;
}

// Check if form data has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $contact = $conn->real_escape_string($_POST['contact']);

    // Insert data into the table
    $sql = "INSERT INTO clients (name, contact) VALUES ('$name', '$contact')";

    if ($conn->query($sql) === TRUE) {
        echo "New client added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Client</title>
</head>
<body>
    <h2>Add a New Client</h2>
    <form action="" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="contact">Contact Details:</label><br>
        <input type="text" id="contact" name="contact" required><br><br>
        <input type="submit" value="Add Client">
    </form>
</body>
</html>
