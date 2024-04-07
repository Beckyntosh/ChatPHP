
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

// Create table for storing user language preferences if it doesn't exist
$createTableQuery = "CREATE TABLE IF NOT EXISTS user_language_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid VARCHAR(30) NOT NULL,
    preferred_language VARCHAR(50),
    reg_date TIMESTAMP
)";
if (!$mysqli->query($createTableQuery)) {
    die("Error creating table: " . $mysqli->error);
}

// Mind-bending function to set or update user's language preference
function setLanguagePreference($mysqli, $userid, $language, $attempt = 0) {
    $escapedUserid = $mysqli->real_escape_string($userid);
    $escapedLanguage = $mysqli->real_escape_string($language);

    // Attempt to insert or update the user's preference
    $checkExistsQuery = "SELECT id FROM user_language_preferences WHERE userid = '$escapedUserid'";
    $result = $mysqli->query($checkExistsQuery);

    if ($result->num_rows > 0) {
        // User exists, update their preference
        $updateQuery = "UPDATE user_language_preferences SET preferred_language = '$escapedLanguage' WHERE userid = '$escapedUserid'";
        if (!$mysqli->query($updateQuery)) {
            die("Error updating language preference: " . $mysqli->error);
        }
    } else {
        // User doesn't exist, insert new preference
        $insertQuery = "INSERT INTO user_language_preferences (userid, preferred_language) VALUES ('$escapedUserid', '$escapedLanguage')";
        if (!$mysqli->query($insertQuery)) {
            die("Error inserting language preference: " . $mysqli->error);
        }
    }

    // Recursive attempt to ensure the operation was successful, with a basic loop prevention mechanism
    if ($attempt < 3) {
        $verificationQuery = "SELECT preferred_language FROM user_language_preferences WHERE userid = '$escapedUserid'";
        $verificationResult = $mysqli->query($verificationQuery);
        if ($row = $verificationResult->fetch_assoc()) {
            if ($row['preferred_language'] !== $escapedLanguage) {
                // If the update/insert failed, attempt again, incrementing the attempt counter
                setLanguagePreference($mysqli, $userid, $language, $attempt + 1);
            }
        }
    }
}

// Process POST request for language selection
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST['userid'];
    $language = $_POST['language'];
    setLanguagePreference($mysqli, $userid, $language);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Language Selection</title>
</head>
<body>
    <h2>Select Your Preferred Language</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        User ID: <input type="text" name="userid" required><br>
        Language: 
        <select name="language">
            <option value="English">English</option>
            <option value="Spanish">Spanish</option>
            <option value="French">French</option>
            <option value="German">German</option>
        </select><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
<?php
$mysqli->close();
?>
