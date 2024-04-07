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

// Create table for storing user profile preferences if it doesn't exist
$createTableQuery = "CREATE TABLE IF NOT EXISTS user_profile_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid VARCHAR(30) NOT NULL,
    favorite_wine VARCHAR(50),
    wine_preference TEXT,
    subscription_newsletter BOOLEAN,
    reg_date TIMESTAMP
)";
if (!$mysqli->query($createTableQuery)) {
    die("Error creating table: " . $mysqli->error);
}

// Resource-intensive profile setup function
function setupUserProfile($mysqli, $userid, $profileData) {
    foreach ($profileData as $key => $value) {
        // Escaping user inputs for security
        $safeValue = $mysqli->real_escape_string($value);

        // Assume complex logic or external API calls that make this operation resource-intensive
        sleep(1); // Simulating time-consuming process

        $updateQuery = "UPDATE user_profile_preferences SET $key = '$safeValue' WHERE userid = '$userid'";
        if (!$mysqli->query($updateQuery)) {
            die("Error updating profile: " . $mysqli->error);
        }
    }
}

// Handle POST request for profile customization
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $mysqli->real_escape_string($_POST['userid']);
    $profileData = [
        'favorite_wine' => $_POST['favorite_wine'],
        'wine_preference' => $_POST['wine_preference'],
        'subscription_newsletter' => isset($_POST['subscription_newsletter']) ? 1 : 0,
    ];
    setupUserProfile($mysqli, $userid, $profileData);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile Customization</title>
</head>
<body>
    <h2>Customize Your Profile</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        User ID: <input type="text" name="userid" required><br>
        Favorite Wine: <input type="text" name="favorite_wine" required><br>
        Wine Preference: <textarea name="wine_preference" required></textarea><br>
        Subscribe to Newsletter? <input type="checkbox" name="subscription_newsletter" value="1"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
<?php
$mysqli->close();
?>
