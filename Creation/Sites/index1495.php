<?php
// Simplified single-file approach (Not recommended for production)

// Database configuration
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

// Create table for clients if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS clients (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  contact_email VARCHAR(50),
  contact_phone VARCHAR(15),
  reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Insert client into the database
    $sql = "INSERT INTO clients (name, contact_email, contact_phone)
    VALUES ('".$conn->real_escape_string($name)."', '".$conn->real_escape_string($email)."', '".$conn->real_escape_string($phone)."')";

    if ($conn->query($sql) === TRUE) {
        echo "New client added successfully";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Client to CRM</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
        }
        .input-group {
            margin-bottom: 20px;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
        }
        .input-group input[type='text'], .input-group input[type='email'], .input-group input[type='tel'] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .input-group input[type='submit'] {
            cursor: pointer;
            background: #333;
            color: white;
            border: 0;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add a New Client</h2>
        <form action="" method="post">
            <div class="input-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="input-group">
                <label for="phone">Phone:</label>
                <input type="tel" name="phone" id="phone">
            </div>
            <div class="input-group">
                <input type="submit" value="Add Client">
            </div>
        </form>
    </div>
</body>
</html>
