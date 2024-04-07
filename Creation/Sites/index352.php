<?php
// Connection Parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to the database
$link = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

// Create user_preferences table if not exists
$createTableSql = "CREATE TABLE IF NOT EXISTS user_preferences (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  homepage_layout VARCHAR(255) NOT NULL,
  theme VARCHAR(255) NOT NULL
)";
$link->query($createTableSql);

// Handle user's preference submission
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['save_preferences'])) {
    $user_id = 1; // Assuming a static user for example purposes
    $homepage_layout = $_POST['homepage_layout'];
    $theme = $_POST['theme'];

    // Save or update user preferences
    $checkExistsSql = "SELECT id FROM user_preferences WHERE user_id = $user_id";
    $existsResult = $link->query($checkExistsSql);
    
    if($existsResult->num_rows > 0) {
        // Update existing preferences
        $updateSql = "UPDATE user_preferences SET homepage_layout = ?, theme = ? WHERE user_id = ?";
    } else {
        // Insert new preferences
        $updateSql = "INSERT INTO user_preferences (homepage_layout, theme, user_id) VALUES (?, ?, ?)";
    }
    
    $stmt = $link->prepare($updateSql);
    $stmt->bind_param("ssi", $homepage_layout, $theme, $user_id);
    $stmt->execute();
    
    echo '<script>alert("Preferences saved successfully");</script>';
}

// Fetch current preferences for the static user
$preferencesSql = "SELECT homepage_layout, theme FROM user_preferences WHERE user_id = 1";
$preferencesResult = $link->query($preferencesSql);
$currentPreferences = $preferencesResult->fetch_assoc();

$link->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Preferences Setting</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: <?php echo isset($currentPreferences['theme']) ? $currentPreferences['theme'] : 'white'; ?>; }
        .container { max-width: 600px; margin: 30px auto; padding: 20px; }
        select, button { width: 100%; padding: 10px; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <label for="homepage_layout">Homepage Layout:</label>
            <select id="homepage_layout" name="homepage_layout" required>
                <option value="classic" <?php echo (isset($currentPreferences['homepage_layout']) && $currentPreferences['homepage_layout'] == 'classic') ? 'selected' : ''; ?>>Classic</option>
                <option value="modern" <?php echo (isset($currentPreferences['homepage_layout']) && $currentPreferences['homepage_layout'] == 'modern') ? 'selected' : ''; ?>>Modern</option>
            </select>
            <label for="theme">Theme:</label>
            <select id="theme" name="theme" required>
                <option value="white" <?php echo (isset($currentPreferences['theme']) && $currentPreferences['theme'] == 'white') ? 'selected' : ''; ?>>Light</option>
                <option value="#3E2723" <?php echo (isset($currentPreferences['theme']) && $currentPreferences['theme'] == '#3E2723') ? 'selected' : ''; ?>>Medieval Dark</option>
            </select>
            <button type="submit" name="save_preferences">Save Preferences</button>
        </form>
    </div>
</body>
</html>