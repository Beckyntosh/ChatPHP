// PARAMETERS: Function: Language Preference Selection during Signup: create an example feature for language preference selection during signup. Example: User selects their preferred interface language during account creation Product: Travel Style: beginner-friendly
<?php
// Define database configuration
define("DB_SERVER", "db");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_DATABASE", "my_database");

// Create connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create users table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    preferred_language VARCHAR(5) NOT NULL,
    reg_date TIMESTAMP
)";
if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $preferred_language = $_POST["preferred_language"];

    $sql = "INSERT INTO users (username, email, preferred_language) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $preferred_language);
    
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup with Language Preference</title>
</head>
<body>
    <h2>Signup Form</h2>
    <form action="" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        
        <label for="preferred_language">Preferred Language:</label><br>
        <select id="preferred_language" name="preferred_language" required>
            <option value="en">English</option>
            <option value="es">Spanish</option>
            <option value="fr">French</option>
Add more languages as needed
        </select><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
