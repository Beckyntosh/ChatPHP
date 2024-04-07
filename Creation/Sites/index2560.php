<?php
// Define connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

* Attempt MySQL server connection. */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt to create table for dashboard customization settings
$sql = "CREATE TABLE IF NOT EXISTS dashboard_settings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    layout_style VARCHAR(30) NOT NULL,
    widgets VARCHAR(255),
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if(mysqli_query($link, $sql)){
    echo "Table dashboard_settings created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Check if it's the first login
// Dummy user id for demonstration
$user_id = 1; // This would typically come from session or JWT after user login

// Check if user settings already exist
$checkSettingsSql = "SELECT * FROM dashboard_settings WHERE user_id = $user_id";
$result = mysqli_query($link, $checkSettingsSql);
$isNewUser = mysqli_num_rows($result) == 0 ? true : false;

// Handle POST request to update settings
if ($_SERVER["REQUEST_METHOD"] == "POST" && $isNewUser) {
    $layoutStyle = $_POST['layoutStyle'];
    $widgets = isset($_POST['widgets']) ? implode(',', $_POST['widgets']) : '';

    $insertSql = "INSERT INTO dashboard_settings (user_id, layout_style, widgets) VALUES ('$user_id', '$layoutStyle', '$widgets')";
    if(mysqli_query($link, $insertSql)){
        echo "Dashboard settings updated successfully.";
        $isNewUser = false; // Update flag to reflect the settings are no longer new
    } else{
        echo "ERROR: Could not able to execute $insertSql. " . mysqli_error($link);
    }
}

mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customize Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form, .welcome { text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
<?php if ($isNewUser): ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h2>Customize Your Dashboard</h2>
        <div>
            <label>Layout Style:</label>
            <select name="layoutStyle">
                <option value="Standard">Standard</option>
                <option value="Compact">Compact</option>
                <option value="Extended">Extended</option>
            </select>
        </div>
        <div>
            <label>Select Widgets:</label>
            <input type="checkbox" name="widgets[]" value="Calendar">Calendar
            <input type="checkbox" name="widgets[]" value="Notes">Notes
            <input type="checkbox" name="widgets[]" value="Tasks">Tasks
        </div>
        <button type="submit">Save Dashboard Settings</button>
    </form>
<?php else: ?>
    <div class="welcome">
        <h2>Welcome Back!</h2>
        <p>Your dashboard is ready.</p>
    </div>
<?php endif; ?>
</body>
</html>
