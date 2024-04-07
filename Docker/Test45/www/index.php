// PARAMETERS: Function: Customizable User Dashboard Creation on First Login: create an example feature for customizing the dashboard on first login. Example: User customizes their dashboard layout and widgets after first login Product: Beauty Products Style: scalable
<?php
// Configuration for database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

try {
    // Create connection using PDO
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the dashboard_setting table exists, if not, create it
    $sql = "CREATE TABLE IF NOT EXISTS dashboard_setting (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id INT(6) UNSIGNED NOT NULL,
        layout VARCHAR(30) NOT NULL,
        widgets VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    // Execute query
    $pdo->exec($sql);

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// User creation imitation. In real scenarios, user_id should come from session or auth
$user_id = 1;

// Check if user has already customized their dashboard
try {
    $stmt = $pdo->prepare("SELECT * FROM dashboard_setting WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    $userSettings = $stmt->fetch(PDO::FETCH_ASSOC);

    // If no settings found, it's assumed a first login
    if (!$userSettings) {
        // Handle POST request for first login customization
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['layout']) && isset($_POST['widgets'])) {
            $layout = $_POST['layout'];
            $widgets = implode(',', $_POST['widgets']); // Assuming widgets are sent as an array

            // Insert customization into the database
            $stmt = $pdo->prepare("INSERT INTO dashboard_setting (user_id, layout, widgets) VALUES (:user_id, :layout, :widgets)");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':layout', $layout);
            $stmt->bindParam(':widgets', $widgets);

            if ($stmt->execute()) {
                echo 'Dashboard customized successfully.<br>';
            } else {
                echo 'Error customizing dashboard.<br>';
            }
        }
    }

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Customization</title>
    <style>
        body {font-family: Arial, sans-serif;}
        .container {max-width: 600px; margin: auto; padding: 20px;}
    </style>
</head>
<body>
    <div class="container">
        <?php if(isset($userSettings)): ?>
            <h2>Your Dashboard is Customized</h2>
        <?php else: ?>
            <h2>Customize Your Dashboard</h2>
            <form action="" method="post">
                <label for="layout">Choose a layout:</label>
                <select name="layout" id="layout">
                    <option value="grid">Grid</option>
                    <option value="list">List</option>
                </select><br>

                <p>Select widgets:</p>
                <input type="checkbox" id="widget1" name="widgets[]" value="Latest Products">
                <label for="widget1"> Latest Products</label><br>
                <input type="checkbox" id="widget2" name="widgets[]" value="Best Sellers">
                <label for="widget2"> Best Sellers</label><br>
                <input type="checkbox" id="widget3" name="widgets[]" value="News">
                <label for="widget3"> News</label><br>

                <input type="submit" value="Customize Dashboard">
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
