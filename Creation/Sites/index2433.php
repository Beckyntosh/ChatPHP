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

// Create tables if they don't exist
$sqlUserTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$sqlPreferencesTable = "CREATE TABLE IF NOT EXISTS preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
news_category VARCHAR(50),
FOREIGN KEY (user_id) REFERENCES users(id)
)";

// Execute queries
$conn->query($sqlUserTable);
$conn->query($sqlPreferencesTable);

// Handle User Registration and Preferences submission
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $categories = $_POST['categories'];

    // Insert user into users table
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    if ($stmt->execute()) {
        $userId = $stmt->insert_id;
        // Insert preferences into preferences table
        foreach ($categories as $category) {
            $stmtPref = $conn->prepare("INSERT INTO preferences (user_id, news_category) VALUES (?, ?)");
            $stmtPref->bind_param("is", $userId, $category);
            $stmtPref->execute();
        }
        $message = "Registration successful!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Registration for Customizable News Feed</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 300px; padding: 20px; }
        label, input, select { display: block; margin-bottom: 10px; }
        button { margin-top: 10px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Register for Customized News Feed</h2>
    <p><?php echo $message; ?></p>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <label for="categories">Select your preferred news categories:</label>
        <select id="categories" name="categories[]" multiple size="5">
            <option value="Health">Health</option>
            <option value="Science">Science</option>
            <option value="Vitamins">Vitamins</option>
            <option value="Diet">Diet</option>
            <option value="Exercise">Exercise</option>
        </select>
        
        <button type="submit" name="register">Register</button>
    </form>
</div>

</body>
</html>

<?php
$conn->close();
?>
