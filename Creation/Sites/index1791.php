<?php
// Connection to MySQL database
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

// Create table for privacy settings if it doesn't exist
$createTableQuery = "CREATE TABLE IF NOT EXISTS user_privacy_settings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED NOT NULL,
profile_visibility ENUM('public', 'private', 'friends') DEFAULT 'public',
reg_date TIMESTAMP
)";

if (!$conn->query($createTableQuery)) {
    echo "Error creating table: " . $conn->error;
}

// Checking if there is a form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Securely getting the user input
    $user_id = 1; // This is a placeholder. Implement user authentication to get a real user ID.
    $profile_visibility = htmlspecialchars($_POST["profile_visibility"]);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO user_privacy_settings (user_id, profile_visibility) VALUES (?, ?) ON DUPLICATE KEY UPDATE profile_visibility=?");
    $stmt->bind_param("iss", $user_id, $profile_visibility, $profile_visibility);

    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Privacy Settings Panel</title>
        <style>
            body { font-family: Arial, sans-serif; }
            .container { width: 40%; margin: auto;}
            label { font-weight: bold;}
            select { width: 100%; padding: 10px; margin: 10px 0; }
            input[type=submit] { padding: 10px 20px; background-color: #007BFF; color: #FFFFFF; border: none; cursor: pointer; }
            input[type=submit]:hover { background-color: #0056b3; }
        </style>
</head>
<body>
    <div class="container">
        <h2>Privacy Settings</h2>
        <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
            <div>
                <label for="profile_visibility">Profile Visibility:</label>
                <select id="profile_visibility" name="profile_visibility">
                    <option value="public">Public</option>
                    <option value="private">Private</option>
                    <option value="friends">Friends</option>
                </select>
            </div>
            <input type="submit" value="Save Settings">
        </form>
    </div>
</body>
</html>
