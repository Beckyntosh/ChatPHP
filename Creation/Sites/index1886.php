<?php
// Connect to database
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

// Create tables if they do not exist
$usersTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP
)";

$preferencesTable = "CREATE TABLE IF NOT EXISTS preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userId INT(6) UNSIGNED,
preference VARCHAR(50),
FOREIGN KEY(userId) REFERENCES users(id)
)";

if (!$conn->query($usersTable) || !$conn->query($preferencesTable)) {
    echo "Error creating table: " . $conn->error;
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);  // Simple hashing for demonstration
    $preferences = $_POST['preferences']; // Expecting an array of preferences

    // Insert user
    $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $firstname, $lastname, $email, $password);
    $stmt->execute();
    $userId = $stmt->insert_id;

    // Insert preferences
    foreach ($preferences as $preference) {
        $preferenceStmt = $conn->prepare("INSERT INTO preferences (userId, preference) VALUES (?, ?)");
        $preferenceStmt->bind_param("is", $userId, $preference);
        $preferenceStmt->execute();
    }

    echo "User Registered Successfully!";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Register for News Feed</title>
    <style>
        /* Add your brave style here */
        body { font-family: Arial, sans-serif; }
        .container { max-width: 800px; margin: auto; padding: 20px; }
    </style>
</head>
<body>

<div class="container">
    <h2>User Registration for Customizable News Feed</h2>
    <form action="" method="post">
        <label for="firstname">First Name:</label><br>
        <input type="text" name="firstname" required><br>
        <label for="lastname">Last Name:</label><br>
        <input type="text" name="lastname" required><br>
        <label for="email">Email:</label><br>
        <input type="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" required><br>
        <label for="preferences[]">Preferences:</label><br>
        <select name="preferences[]" multiple>
            <option value="Gold">Gold</option>
            <option value="Silver">Silver</option>
            <option value="Diamond">Diamond</option>
        </select><br>
        <input type="submit" value="Register">
    </form>
</div>

</body>
</html>
