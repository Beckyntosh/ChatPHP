<?php
// Initialize session
session_start();

// Database credentials
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

// If user preferences form is submitted
if(isset($_POST['submit'])) {
    $userId = $_SESSION['user_id']; // Assuming session holds logged-in user ID
    $homepageLayout = $_POST['homepageLayout'];
    $theme = $_POST['theme'];

    // Check if user preferences already exist
    $checkQuery = "SELECT * FROM user_preferences WHERE user_id='$userId'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        // Update existing user preferences
        $updateQuery = "UPDATE user_preferences SET homepage_layout='$homepageLayout', theme='$theme' WHERE user_id='$userId'";
        $conn->query($updateQuery);
    } else {
        // Insert new user preferences
        $insertQuery = "INSERT INTO user_preferences (user_id, homepage_layout, theme) VALUES ('$userId', '$homepageLayout', '$theme')";
        $conn->query($insertQuery);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Preferences</title>
</head>
<body style="font-weight: bold;">

    <h2>Set Your Preferences</h2>

    <form method="POST">
        <label for="homepageLayout">Homepage Layout:</label><br>
        <select name="homepageLayout" id="homepageLayout">
            <option value="grid">Grid</option>
            <option value="list">List</option>
        </select><br><br>

        <label for="theme">Theme:</label><br>
        <select name="theme" id="theme">
            <option value="light">Light</option>
            <option value="dark">Dark</option>
        </select><br><br>

        <input type="submit" name="submit" value="Save Preferences">
    </form>

</body>
</html>
<?php
// Close database connection
$conn->close();
?>
