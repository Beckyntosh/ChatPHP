// PARAMETERS: Function: Customizable User Dashboard Creation on First Login: create an example feature for customizing the dashboard on first login. Example: User customizes their dashboard layout and widgets after first login Product: Bath Products Style: bold
<?php
// Simple Dashboard Customization Script for Bath Products Website
// Strictly for educational and research purposes

// Database Connection
define("MYSQL_ROOT_PSWD", 'root');
define("MYSQL_DB", 'my_database');
define("SERVERNAME", 'db');

// Connect to MySQL Database
$conn = new mysqli(SERVERNAME, 'root', MYSQL_ROOT_PSWD, MYSQL_DB);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Dashboard Widgets Table If Not Exists
$widgetsTableSql = "CREATE TABLE IF NOT EXISTS user_widgets (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    widget_name VARCHAR(30) NOT NULL,
    position INT(3) UNSIGNED,
    visible BOOLEAN,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

if (!$conn->query($widgetsTableSql)) {
    echo "Error creating table: " . $conn->error;
}

// Handle User Registration/Login (Simulated)
$user_id = 1; // Assuming a logged-in user with user_id 1

// Handle Dashboard Customization Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['customize_dashboard'])) {
    $visibleWidgets = $_POST['widgets'] ?? [];
    // Update Widget Visibility and Position
    foreach ($visibleWidgets as $position => $widgetName) {
        $visible = 1;
        $updateSql = "INSERT INTO user_widgets (user_id, widget_name, position, visible) VALUES ($user_id, '$widgetName', $position, $visible)
                      ON DUPLICATE KEY UPDATE position = VALUES(position), visible = VALUES(visible)";
        if (!$conn->query($updateSql)) {
            echo "Error: " . $conn->error;
        }
    }
}

// Fetch Current User's Dashboard Configuration
$userWidgetsSql = "SELECT widget_name, position FROM user_widgets WHERE user_id = $user_id AND visible = 1 ORDER BY position ASC";
$userWidgetsResult = $conn->query($userWidgetsSql);
$userWidgets = [];
while ($row = $userWidgetsResult->fetch_assoc()) {
    $userWidgets[] = $row['widget_name'];
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Bath Products Dashboard Customization</title>
    <style>
        body {
           font-family: Arial, sans-serif; 
        }
        .dashboard-widget {
            border: 2px solid #000;
            padding: 10px;
            margin-bottom: 10px;
            background-color: lightgrey;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2>Customize Your Dashboard</h2>

<form method="POST">
    <div>
        <label>
            <input type="checkbox" name="widgets[]" value="LatestOffers" <?php echo in_array("LatestOffers", $userWidgets) ? "checked" : ""; ?>> Latest Offers
        </label>
    </div>
    <div>
        <label>
            <input type="checkbox" name="widgets[]" value="PopularProducts" <?php echo in_array("PopularProducts", $userWidgets) ? "checked" : ""; ?>> Popular Products
        </label>
    </div>
    <div>
        <label>
            <input type="checkbox" name="widgets[]" value="NewArrivals" <?php echo in_array("NewArrivals", $userWidgets) ? "checked" : ""; ?>> New Arrivals
        </label>
    </div>
    
    <button type="submit" name="customize_dashboard">Save Dashboard</button>
</form>

<h3>Your Dashboard</h3>
<div>
    <?php foreach ($userWidgets as $widget): ?>
    <div class="dashboard-widget">
        <?php echo htmlspecialchars($widget); ?>
    </div>
    <?php endforeach; ?>
</div>

</body>
</html>
<?php
$conn->close();
?>
