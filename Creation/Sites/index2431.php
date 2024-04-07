<?php
// Establish database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$usersTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    preferences VARCHAR(255),
    reg_date TIMESTAMP
)";

$preferencesTable = "CREATE TABLE IF NOT EXISTS preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    category VARCHAR(50),
    interest_level INT(1),
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

$conn->query($usersTable);
$conn->query($preferencesTable);

// Register user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $preferences = json_encode($_POST['preference']); // Assuming preferences sent as an array

    $insertUser = "INSERT INTO users (username, password, preferences)
    VALUES ('$username', '$password', '$preferences')";

    if ($conn->query($insertUser) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insertUser . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register for Custom News Feed</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f3f3f3; }
        .container { max-width: 600px; margin: auto; background: #fff; padding: 20px; }
        label, input, select { display: block; margin: 10px 0; }
    </style>
</head>
<body>

<div class="container">
    <h2>Register for News Feed</h2>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label>Preferences:</label>
        <select multiple name="preference[]">
            <option value="cardio">Cardio Equipment</option>
            <option value="strength">Strength Equipment</option>
            <option value="wellness">Wellness & Recovery</option>
        </select>

        <button type="submit" name="register">Register</button>
    </form>
</div>

</body>
</html>

<?php $conn->close(); ?>
