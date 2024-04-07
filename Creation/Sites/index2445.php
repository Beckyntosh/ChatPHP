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

// Create table for users
$userTableSql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
google_id VARCHAR(255) NOT NULL,
email VARCHAR(50) NOT NULL,
name VARCHAR(50) NOT NULL,
registration_date TIMESTAMP,
UNIQUE (google_id),
UNIQUE (email)
)";

if ($conn->query($userTableSql) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Simulated Google auth callback
if (isset($_GET['google_auth'])) {
    // In a real application, you would verify the Google ID token and fetch the user's profile
    // For demonstration purposes, let's simulate user data
    $googleUserData = [
        'google_id' => 'simulatedGoogleId123',
        'email' => 'user@example.com',
        'name' => 'John Doe',
    ];

    // Check if user already exists
    $checkUserSql = "SELECT id FROM users WHERE google_id = ?";
    $stmt = $conn->prepare($checkUserSql);
    $stmt->bind_param("s", $googleUserData['google_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows == 0) {
        // Insert new user
        $insertSql = "INSERT INTO users (google_id, email, name) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertSql);
        $stmt->bind_param("sss", $googleUserData['google_id'], $googleUserData['email'], $googleUserData['name']);
        
        if ($stmt->execute()) {
            echo "Registration successful. Welcome, " . $googleUserData['name'] . "!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "User already registered.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Single-Threaded Handbag Store - Signup</title>
<style>
    body { font-family: Arial, sans-serif; background: #f0f0f0; }
    .container { max-width: 400px; margin: 50px auto; background: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    .google-btn { background: #db4437; color: white; padding: 10px 20px; border: none; cursor: pointer; }
    .google-btn:hover { background: #c1351d; }
</style>
</head>
<body>

<div class="container">
    <h2>Sign Up with Google</h2>
    <button class="google-btn" onclick="window.location.href='?google_auth=true'">Sign Up Using Google</button>
</div>

</body>
</html>
