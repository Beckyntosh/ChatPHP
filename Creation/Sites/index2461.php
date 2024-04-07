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

// Create table for users with social media integration for statistical analysis
$userTableSql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
google_id VARCHAR(255) NOT NULL,
email VARCHAR(50) NOT NULL,
name VARCHAR(50) NOT NULL,
registration_date TIMESTAMP,
preferences TEXT,
UNIQUE (google_id),
UNIQUE (email)
)";

if ($conn->query($userTableSql) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle Google auth callback simulation
if (isset($_GET['google_auth'])) {
    // Normally, here you'd verify the Google ID token and extract the user's Google account data
    $simulatedGoogleUserData = [
        'google_id' => 'uniqueGoogleId789',
        'email' => 'statistical@haircareexample.com',
        'name' => 'Alex Smith',
    ];

    $checkUserSql = "SELECT id FROM users WHERE google_id = ?";
    $stmt = $conn->prepare($checkUserSql);
    $stmt->bind_param("s", $simulatedGoogleUserData['google_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows == 0) {
        $insertSql = "INSERT INTO users (google_id, email, name) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertSql);
        $stmt->bind_param("sss", $simulatedGoogleUserData['google_id'], $simulatedGoogleUserData['email'], $simulatedGoogleUserData['name']);
        
        if ($stmt->execute()) {
            echo "Welcome to our statistically inclined hair care store, " . $simulatedGoogleUserData['name'] . "! Your registration was successful.";
        } else {
            echo "Error during registration: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "You're already registered with us. Welcome back!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Statistica Hair Care Products - Signup with Google</title>
<style>
    body { font-family: Arial, sans-serif; background: #f0f0f0; }
    .container { max-width: 400px; margin: 50px auto; background: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    .google-btn { background: #DB4437; color: white; padding: 10px 20px; border: none; cursor: pointer; }
    .google-btn:hover { background: #C1351D; }
</style>
</head>
<body>

<div class="container">
    <h2>Signup with Google</h2>
    <p>Experience the analytical approach to hair care. Signup now!</p>
    <button class="google-btn" onclick="window.location.href='?google_auth=true'">Signup Using Google</button>
</div>

</body>
</html>
