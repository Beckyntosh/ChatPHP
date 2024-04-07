
<?php
// Define database connection parameters
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DATABASE', 'my_database');
define('MYSQL_SERVER', 'db');

// Establish database connection
$mysqli = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Create the table for storing user preferences if it doesn't exist
$createTableQuery = "CREATE TABLE IF NOT EXISTS user_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid VARCHAR(30) NOT NULL,
    homepage_layout VARCHAR(50),
    theme VARCHAR(50),
    reg_date TIMESTAMP
)";
if (!$mysqli->query($createTableQuery)) {
    die("Error creating table: " . $mysqli->error);
}

// Recursive function to handle user preferences
function updateUserPreferences($mysqli, $userid, $preferences, $keys = [], $index = 0) {
    if ($index < count($keys)) {
        $key = $keys[$index];
        $value = $mysqli->real_escape_string($preferences[$key]);
        $updateQuery = "UPDATE user_preferences SET $key = '$value' WHERE userid = '$userid'";
        if (!$mysqli->query($updateQuery)) {
            die("Error updating user preferences: " . $mysqli->error);
        }
        updateUserPreferences($mysqli, $userid, $preferences, $keys, $index + 1);
    }
}

// Process POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $mysqli->real_escape_string($_POST['userid']);
    $preferences = [
        'homepage_layout' => $_POST['homepage_layout'],
        'theme' => $_POST['theme'],
    ];
    $keys = array_keys($preferences);
    updateUserPreferences($mysqli, $userid, $preferences, $keys);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Preferences</title>
</head>
<body>
    <h2>Set Your Preferences</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        User ID: <input type="text" name="userid" required><br>
        Homepage Layout: 
        <select name="homepage_layout">
            <option value="default">Default</option>
            <option value="compact">Compact</option>
            <option value="expanded">Expanded</option>
        </select><br>
        Theme: 
        <select name="theme">
            <option value="light">Light</option>
            <option value="dark">Dark</option>
        </select><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
<?php
$mysqli->close();
?>
