<?php
// Initialize connection variables
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Create table for email preferences if it doesn't exist
$tableQuery = "CREATE TABLE IF NOT EXISTS email_preferences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    order_updates BOOLEAN NOT NULL DEFAULT 1,
    newsletter BOOLEAN NOT NULL DEFAULT 1,
    personalized_ads BOOLEAN NOT NULL DEFAULT 1
)";

if(!mysqli_query($conn, $tableQuery)){
    echo "ERROR: Could not able to execute $tableQuery. " . mysqli_error($conn);
}

// Handling form submission
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $userId = 1; // Static user_id for this example
    $orderUpdates = isset($_POST['order_updates']) ? 1 : 0;
    $newsletter = isset($_POST['newsletter']) ? 1 : 0;
    $personalizedAds = isset($_POST['personalized_ads']) ? 1 : 0;

    $updateQuery = "INSERT INTO email_preferences (user_id, order_updates, newsletter, personalized_ads) VALUES ($userId, $orderUpdates, $newsletter, $personalizedAds) ON DUPLICATE KEY UPDATE order_updates = VALUES(order_updates), newsletter = VALUES(newsletter), personalized_ads = VALUES(personalized_ads)";

    if(mysqli_query($conn, $updateQuery)){
        echo "Preferences updated successfully.";
    } else{
        echo "ERROR: Could not able to execute $updateQuery. " . mysqli_error($conn);
    }
}

// Fetch current settings to display in the form
$currentSettingsQuery = "SELECT order_updates, newsletter, personalized_ads FROM email_preferences WHERE user_id = 1 LIMIT 1";
$currentSettingsResult = mysqli_query($conn, $currentSettingsQuery);
$currentSettings = mysqli_fetch_assoc($currentSettingsResult);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Email Preferences</title>
</head>
<body>
    <h2>Email Notification Settings</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <input type="checkbox" name="order_updates" id="order_updates" <?php echo isset($currentSettings['order_updates']) && $currentSettings['order_updates'] ? 'checked' : ''; ?>>
            <label for="order_updates">Order Updates</label>
        </div>
        <div>
            <input type="checkbox" name="newsletter" id="newsletter" <?php echo isset($currentSettings['newsletter']) && $currentSettings['newsletter'] ? 'checked' : ''; ?>>
            <label for="newsletter">Newsletter</label>
        </div>
        <div>
            <input type="checkbox" name="personalized_ads" id="personalized_ads" <?php echo isset($currentSettings['personalized_ads']) && $currentSettings['personalized_ads'] ? 'checked' : ''; ?>>
            <label for="personalized_ads">Personalized Ads</label>
        </div>
        <div>
            <button type="submit">Save Preferences</button>
        </div>
    </form>
</body>
</html>
<?php
mysqli_close($conn);
?>
