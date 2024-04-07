
<?php
// Connect to MySQL database
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

// Create table for user preferences if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS user_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    homepage_layout VARCHAR(30) NOT NULL,
    theme VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $homepage_layout = $_POST['homepage_layout'];
    $theme = $_POST['theme'];

    $stmt = $conn->prepare("INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $homepage_layout, $theme);

    if ($stmt->execute() === TRUE) {
        echo "Preferences saved successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Preferences</title>
</head>
<body>

<h2>Set Your Preferences</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="user_id">User ID:</label><br>
    <input type="text" id="user_id" name="user_id" required><br>
    <label for="homepage_layout">Homepage Layout:</label><br>
    <select name="homepage_layout" id="homepage_layout" required>
        <option value="classic">Classic</option>
        <option value="modern">Modern</option>
        <option value="compact">Compact</option>
    </select><br>
    <label for="theme">Theme:</label><br>
    <select name="theme" id="theme" required>
        <option value="light">Light</option>
        <option value="dark">Dark</option>
        <option value="colorful">Colorful</option>
    </select><br><br>
    <input type="submit" value="Save Preferences">
</form>

</body>
</html>
