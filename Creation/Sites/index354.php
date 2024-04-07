<?php
// Handle potential database connection and preference update
$serverName = "db";
$username = "root";
$password = "root";
$databaseName = "my_database";

// Create database connection
$conn = new mysqli($serverName, $username, $password, $databaseName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the table if it doesn't exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS user_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    homepage_layout VARCHAR(30) NOT NULL,
    theme VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
)";

if (!$conn->query($tableCreationQuery)) {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted to update user preferences
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $homepageLayout = $_POST['homepage_layout'];
    $theme = $_POST['theme'];

    // Insert or update user preference
    // For simplicity, assuming a single user (id=1)
    $checkExistsQuery = "SELECT id FROM user_preferences WHERE id = 1";
    $result = $conn->query($checkExistsQuery);

    if ($result->num_rows == 0) {
        $insertQuery = $conn->prepare("INSERT INTO user_preferences (id, homepage_layout, theme) VALUES (1, ?, ?)");
        $insertQuery->bind_param("ss", $homepageLayout, $theme);
        $insertQuery->execute();
    } else {
        $updateQuery = $conn->prepare("UPDATE user_preferences SET homepage_layout = ?, theme = ? WHERE id = 1");
        $updateQuery->bind_param("ss", $homepageLayout, $theme);
        $updateQuery->execute();
    }
}

// Fetch existing preferences to display
$preferencesQuery = "SELECT homepage_layout, theme FROM user_preferences WHERE id = 1";
$preferencesResult = $conn->query($preferencesQuery);
if ($preferencesResult->num_rows > 0) {
    $row = $preferencesResult->fetch_assoc();
    $currentLayout = $row['homepage_layout'];
    $currentTheme = $row['theme'];
} else {
    $currentLayout = '';
    $currentTheme = '';
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Preferences</title>
    <style>
        body { background-color: <?php echo $currentTheme == 'dark' ? '#333' : '#fff'; ?>; color: <?php echo $currentTheme == 'dark' ? '#fff' : '#333'; ?>; }
        .container { padding: 20px; }
        .form-group { margin-bottom: 10px; }
        label, select { display: block; }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <div class="form-group">
                <label for="homepage_layout">Homepage Layout</label>
                <select id="homepage_layout" name="homepage_layout">
                    <option value="standard" <?php echo $currentLayout == 'standard' ? 'selected' : ''; ?>>Standard</option>
                    <option value="compact" <?php echo $currentLayout == 'compact' ? 'selected' : ''; ?>>Compact</option>
                </select>
            </div>
            <div class="form-group">
                <label for="theme">Theme</label>
                <select id="theme" name="theme">
                    <option value="light" <?php echo $currentTheme == 'light' ? 'selected' : ''; ?>>Light</option>
                    <option value="dark" <?php echo $currentTheme == 'dark' ? 'selected' : ''; ?>>Dark</option>
                </select>
            </div>
            <button type="submit">Save Preferences</button>
        </form>
    </div>
</body>
</html>