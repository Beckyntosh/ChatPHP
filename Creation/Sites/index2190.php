<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connection parameters
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

    // Sanitize and fetch form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $hashedPassword = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);

    // SQL to create table if not exists
    $sql_table = "CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        password VARCHAR(255),
        reg_date TIMESTAMP
    )";

    if ($conn->query($sql_table) === TRUE) {
        // Insert user data into table
        $sql_insert = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";

        if ($conn->query($sql_insert) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
        }
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Board Games Club</title>
    <style>
        body {font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f0f0f0;}
        .container {max-width: 600px; margin: 30px auto; padding: 20px; background-color: white; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);}
        h2 {color: #333;}
        .form-group {margin-bottom: 15px;}
        .form-group label {display: block; color: #666;}
        .form-group input {width: 100%; padding: 10px 15px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;}
        .form-group input[type=submit] {background-color: #5cb85c; color: white; cursor: pointer;}
        .form-group input[type=submit]:hover {background-color: #4cae4c;}
    </style>
</head>
<body>

<div class="container">
    <h2>Signup for Board Games Club</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Signup">
        </div>
    </form>
</div>

</body>
</html>
