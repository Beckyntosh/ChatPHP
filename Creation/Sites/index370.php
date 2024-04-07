<?php
//Assuming a complete one-file solution is requested, here's a simplified example. Note, in a real application, it's advisable to separate logic, presentation, and data handling.

$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS UserPreferences (
user_id INT(6) UNSIGNED,
favorite_genre VARCHAR(50),
newsletter_subscribed BOOLEAN,
FOREIGN KEY (user_id) REFERENCES Users(id)
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Insert into Users table
    $stmt = $conn->prepare("INSERT INTO Users (username, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $email);

    $username = $_POST['username'];
    $email = $_POST['email'];
    $stmt->execute();
    $last_id = $stmt->insert_id;

    // Insert into UserPreferences table
    $stmt = $conn->prepare("INSERT INTO UserPreferences (user_id, favorite_genre, newsletter_subscribed) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $favorite_genre, $newsletter_subscribed);

    $user_id = $last_id;
    $favorite_genre = $_POST['favorite_genre'];
    $newsletter_subscribed = isset($_POST['newsletter_subscribed']) ? 1 : 0;
    $stmt->execute();

    echo "Profile setup completed successfully";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Setup Your Profile</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; }
        .container { max-width: 600px; margin: 20px auto; background: white; padding: 20px; }
        input[type=text], input[type=email] { width: 100%; padding: 10px; margin: 10px 0; }
        .form-group { margin-bottom: 20px; }
        .btn { padding: 10px 20px; background-color: #333; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Setup Your Profile</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="favorite_genre">Favorite Genre:</label>
                <input type="text" name="favorite_genre" id="favorite_genre">
            </div>
            <div class="form-group">
                <label><input type="checkbox" name="newsletter_subscribed"> Subscribe to newsletter</label>
            </div>
            <input type="submit" class="btn" value="Save Preferences">
        </form>
    </div>
</body>
</html>
