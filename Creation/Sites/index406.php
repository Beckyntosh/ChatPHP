<?php

$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$createUsersTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(30) NOT NULL,
password VARCHAR(50) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

if (!$conn->query($createUsersTable)) {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $insertUserSQL = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
    $stmt= $conn->prepare($insertUserSQL);
    $stmt->bind_param("sss", $username, $passwordHash, $email);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insertUserSQL . "<br>" . $conn->error;
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Skateboards Premium Cloud Storage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .signup-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-input {
            margin-bottom: 20px;
        }
        .form-input input {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-input label {
            display: block;
            margin-bottom: 5px;
        }
        .form-submit {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="" method="post" class="signup-form">
        <h2>Sign Up for Access to Premium File Storage Features</h2>
        <div class="form-input">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-input">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-input">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
        </div>
        <input type="submit" value="Sign Up" class="form-submit">
    </form>
</body>
</html>