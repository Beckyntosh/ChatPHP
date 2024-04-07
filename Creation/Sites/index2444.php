<?php
// Database connection
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

// Create tables if not exists
$usersTableSql = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
)";

$preferencesTableSql = "CREATE TABLE IF NOT EXISTS preferences (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) UNSIGNED,
    preference_type VARCHAR(50) NOT NULL,
    preference_value VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

$conn->query($usersTableSql);
$conn->query($preferencesTableSql);

// Handle registration form submit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string(md5($_POST['password'])); // simple hash for demonstration
    $email = $conn->real_escape_string($_POST['email']);
    $categories = $_POST['categories']; // Array of selected categories

    // Insert user
    $insertUserSql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    if ($conn->query($insertUserSql) === TRUE) {
        $last_id = $conn->insert_id;
        // Insert preferences
        foreach ($categories as $category) {
            $insertPreferenceSql = "INSERT INTO preferences (user_id, preference_type, preference_value) VALUES ('$last_id', 'category', '$category')";
            $conn->query($insertPreferenceSql);
        }
        echo "New record created successfully";
    } else {
        echo "Error: " . $insertUserSql . "<br>" . $conn->error;
    }  
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
<h2>User Registration for Customizable News Feed</h2>
<form action="" method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Email: <input type="email" name="email"><br>
    News Feed Categories:<br>
    <input type="checkbox" name="categories[]" value="Dogs"> Dogs<br>
    <input type="checkbox" name="categories[]" value="Cats"> Cats<br>
    <input type="checkbox" name="categories[]" value="Fish"> Fish<br>
    <input type="checkbox" name="categories[]" value="Birds"> Birds<br>
    <input type="submit" name="register" value="Register"><br>
</form>
</body>
</html>
