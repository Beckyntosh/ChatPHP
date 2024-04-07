<?php
// This script handles both displaying a signup form and processing it.

// Define database credentials
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Attempt to connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they do not exist
$usersTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    is_loyalty_member BOOLEAN DEFAULT FALSE,
    reg_date TIMESTAMP
)";

$loyaltyMembersTable = "CREATE TABLE IF NOT EXISTS loyalty_members (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    points INT(10) DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

// Execute table creation
$conn->query($usersTable);
$conn->query($loyaltyMembersTable);

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $isLoyaltyMember = isset($_POST['loyalty_signup']) ? 1 : 0;
    
    // Insert the new user into the users table
    $stmt = $conn->prepare("INSERT INTO users (username, password, is_loyalty_member) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $username, $password, $isLoyaltyMember);
    $stmt->execute();

    // If the user opted into the loyalty program, insert them into the loyalty_members table
    if ($isLoyaltyMember) {
        $lastId = $conn->insert_id;
        $stmt = $conn->prepare("INSERT INTO loyalty_members (user_id, points) VALUES (?, 0)");
        $stmt->bind_param("i", $lastId);
        $stmt->execute();
    }

    echo "Registration successful!";
    $stmt->close();
    $conn->close();
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .form-container {
            margin: 50px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Sign Up</h2>
    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <div>
            <input type="checkbox" id="loyalty_signup" name="loyalty_signup">
            <label for="loyalty_signup">Sign up for the loyalty program</label>
        </div>
        
        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>