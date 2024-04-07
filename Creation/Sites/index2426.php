<?php
// Connect to Database
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

// Create Users Table if not exists
$usersTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";

// Execute query
$conn->query($usersTable);

// Create News Preferences Table if not exists
$preferencesTable = "CREATE TABLE IF NOT EXISTS news_preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
category VARCHAR(50) NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id)
)";

// Execute query
$conn->query($preferencesTable);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $category = $_POST['category'];

    // Insert user to users table
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $user_id = $stmt->insert_id;

    // Insert preference to news_preferences table
    $stmt = $conn->prepare("INSERT INTO news_preferences (user_id, category) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $category);
    $stmt->execute();

    echo "Registration successful!";
}
?>

<!doctype html>
<html>
<head>
    <title>Baby Products Website</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }
        .container { background-color: #fff; padding: 20px; border-radius: 5px; }
        h2 { color: #333; }
        form { display: flex; flex-direction: column; }
        input[type='text'], input[type='password'], select { margin-bottom: 20px; padding: 10px; border-radius: 5px; border: 1px solid #ddd; }
        input[type='submit'] { padding: 10px 15px; background-color: #5cb85c; color: white; border: none; cursor: pointer; border-radius: 5px; }
        input[type='submit']:hover { background-color: #449d44; }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Registration - Customize Your News Feed</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="category">Favorite Category:</label>
            <select id="category" name="category">
                <option value="baby_care">Baby Care</option>
                <option value="nutrition">Nutrition</option>
                <option value="toys">Toys</option>
                <option value="education">Education</option>
            </select>
            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>
<?php
$conn->close();
?>
