<?php
// Simple script to handle sign up for premium file storage - Not recommended for production without enhancements

// Define MYSQL credentials
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "root");
define("MYSQL_DATABASE", "my_database");
define("MYSQL_HOST", "db");

// Establish MYSQL Connection
$connection = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if the signup form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password']; // In a production environment, please ensure to hash the password

    // Simple validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
    } else {
        // Check if user already exists
        $checkUserQuery = "SELECT id FROM users WHERE email = ?";
        $stmt = $connection->prepare($checkUserQuery);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "User already exists.";
        } else {
            // Insert new user
            $insertQuery = "INSERT INTO users (email, password) VALUES (?, ?)";
            $stmt = $connection->prepare($insertQuery);
            $stmt->bind_param("ss", $email, $password);
            $success = $stmt->execute();

            if ($success) {
                echo "Signup successful!";
            } else {
                echo "Error: " . $connection->error;
            }
        }

        $stmt->close();
    }
    
    $connection->close();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup for Premium File Storage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        
        .container {
            width: 300px;
            padding: 20px;
            background-color: white;
            margin: 100px auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Signup</h2>
    <form action="" method="post">
        <input type="email" name="email" required placeholder="Email">
        <input type="password" name="password" required placeholder="Password">
        <input type="submit" value="Sign Up">
    </form>
</div>

</body>
</html>
