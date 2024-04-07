<?php
// Establish connection to the database
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

// Check if the preference form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $homepageLayout = $_POST['homepageLayout'];
    $theme = $_POST['theme'];
    $userID = 1; // Assuming a logged in user with ID 1 for example sake
    
    // Insert or update user preference into database
    $sql = "INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES ($userID, '$homepageLayout', '$theme') ON DUPLICATE KEY UPDATE homepage_layout='$homepageLayout', theme='$theme'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Retrieve user preferences
$userPreferencesSql = "SELECT homepage_layout, theme FROM user_preferences WHERE user_id = 1";
$userPreferencesResult = $conn->query($userPreferencesSql);
if ($userPreferencesResult->num_rows > 0) {
    // output data of each row
    while($row = $userPreferencesResult->fetch_assoc()) {
        $userHomepageLayout = $row["homepage_layout"];
        $userTheme = $row["theme"];
    }
} else {
    $userHomepageLayout = "default";
    $userTheme = "light";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en" data-theme="<?php echo $userTheme; ?>">
<head>
    <meta charset="UTF-8">
    <title>User Preferences</title>
    <style>
        body[data-theme="dark"] {
            background-color: #333;
            color: white;
        }
        body[data-theme="light"] {
            background-color: #f4f4f4;
            color: black;
        }
        .layout-1 { /* Example layout 1 style */ }
        .layout-2 { /* Example layout 2 style */ }
    </style>
</head>
<body class="<?php echo $userHomepageLayout; ?>">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="homepageLayout">Homepage Layout:</label>
        <select id="homepageLayout" name="homepageLayout">
            <option value="layout-1" <?php echo ($userHomepageLayout == 'layout-1' ? 'selected' : ''); ?>>Layout 1</option>
            <option value="layout-2" <?php echo ($userHomepageLayout == 'layout-2' ? 'selected' : ''); ?>>Layout 2</option>
        </select>
        <br>
        <label for="theme">Theme:</label>
        <select id="theme" name="theme">
            <option value="light" <?php echo ($userTheme == 'light' ? 'selected' : ''); ?>>Light</option>
            <option value="dark" <?php echo ($userTheme == 'dark' ? 'selected' : ''); ?>>Dark</option>
        </select>
        <br>
        <button type="submit">Save Preferences</button>
    </form>
</body>
</html>
