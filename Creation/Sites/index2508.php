<?php
// Set database connection variables
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

// Create table for storing user preferences if it does not exist
$table = "CREATE TABLE IF NOT EXISTS user_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    preferred_language VARCHAR(50),
    reg_date TIMESTAMP
)";
$conn->query($table);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $preferred_language = $_POST["preferred_language"];
    
    $stmt = $conn->prepare("INSERT INTO user_preferences (username, preferred_language) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $preferred_language);
    
    if ($stmt->execute()) {
        echo "Account created successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="preferred_language">Preferred Language:</label>
        <select id="preferred_language" name="preferred_language" required>
            <option value="English">English</option>
            <option value="French">French</option>
            <option value="Spanish">Spanish</option>
            <option value="German">German</option>
            <option value="Italian">Italian</option>
        </select><br><br>
        
        <input type="submit" value="Signup">
    </form>
</body>
</html>
