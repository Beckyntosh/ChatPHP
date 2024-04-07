<?php
// Database Configuration
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

// Establish Connection to Database
$mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check Connection
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Create Tables if not exists
$createWidgetsTable = "CREATE TABLE IF NOT EXISTS widgets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL, 
    allowed_positions VARCHAR(255) NOT NULL
)";

$createUserDashboardTable = "CREATE TABLE IF NOT EXISTS user_dashboards (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    widget_id INT NOT NULL,
    position VARCHAR(255) NOT NULL,
    FOREIGN KEY (widget_id) REFERENCES widgets(id) ON DELETE CASCADE
)";

$mysqli->query($createWidgetsTable);
$mysqli->query($createUserDashboardTable);

// Check if it's the user's first login
$user_id = 1; // Static ID for demonstration
$firstLoginQuery = "SELECT COUNT(*) AS count FROM user_dashboards WHERE user_id = $user_id";
$result = $mysqli->query($firstLoginQuery);
$row = $result->fetch_assoc();
$isFirstLogin = $row['count'] == 0 ? true : false;

// Handle POST request to save user dashboard configuration
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['widget_positions'])) {
    foreach ($_POST['widget_positions'] as $widgetId => $position) {
        $prepared = $mysqli->prepare("INSERT INTO user_dashboards (user_id, widget_id, position) VALUES (?, ?, ?)");
        $prepared->bind_param("iis", $user_id, $widgetId, $position);
        $prepared->execute();
    }
    // Redirect to prevent form resubmission
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customizable User Dashboard</title>
    <style>
        /* Basic styling for demonstration */
        .widget {
            border: 2px solid #007bff;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php if ($isFirstLogin) : ?>
        <h2>Customize Your Dashboard</h2>
        <form action="" method="POST">
            <?php 
            $widgetsQuery = "SELECT * FROM widgets";
            $widgetsResult = $mysqli->query($widgetsQuery);
            while($widget = $widgetsResult->fetch_assoc()) {
                echo "<div class='widget'>";
                echo "<label for='widget_" . $widget['id'] . "'>" . htmlspecialchars($widget['name']) . " Position: </label>";
                echo "<select name='widget_positions[" .$widget['id'] . "]'>";
                foreach (explode(',', $widget['allowed_positions']) as $position) {
                    echo "<option value='" . htmlspecialchars($position) . "'>" . htmlspecialchars($position) . "</option>";
                }
                echo "</select>";
                echo "</div>";
            }
            ?>
            <button type="submit">Save Dashboard Layout</button>
        </form>
    <?php else : ?>
        <h2>Your Dashboard</h2>
        <?php 
        $dashboardQuery = "SELECT widgets.name, user_dashboards.position FROM user_dashboards INNER JOIN widgets ON user_dashboards.widget_id = widgets.id WHERE user_dashboards.user_id = $user_id";
        $dashboardResult = $mysqli->query($dashboardQuery);
        while($dashboard = $dashboardResult->fetch_assoc()) {
            echo "<div class='widget'><strong>" . htmlspecialchars($dashboard['name']) . "</strong> - " . htmlspecialchars($dashboard['position']) . "</div>";
        }
        ?>
    <?php endif; ?>
</body>
</html>
<?php $mysqli->close(); ?>
