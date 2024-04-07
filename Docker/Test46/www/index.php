// PARAMETERS: Function: Customizable User Dashboard Creation on First Login: create an example feature for customizing the dashboard on first login. Example: User customizes their dashboard layout and widgets after first login Product: Musical Instruments Style: ultraprecise
<?php
// Connection setup
define("MYSQL_ROOT_PSWD", "root");
define("MYSQL_DB", "my_database");
define("SERVERNAME", "db");

// Connect to MySQL
$conn = new mysqli(SERVERNAME, "root", MYSQL_ROOT_PSWD, MYSQL_DB);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$table = "CREATE TABLE IF NOT EXISTS user_dashboard (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) NOT NULL,
    dashboard_layout VARCHAR(255) NOT NULL,
    widget_settings TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($table)) {
    echo "Error creating table: " . $conn->error;
}

// Check if it's a first login
$userId = 1; // Sample user ID
$checkFirstLogin = "SELECT * FROM user_dashboard WHERE user_id = $userId";
$result = $conn->query($checkFirstLogin);

if ($result->num_rows == 0) {
    // It's first login
    $firstLogin = true;
} else {
    // Not first login
    $firstLogin = false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // User customization data from POST
    $layout = $_POST['layout'];
    $widgets = json_encode($_POST['widgets']);
    
    // Insert or update user dashboard settings
    if ($firstLogin) {
        $query = "INSERT INTO user_dashboard (user_id, dashboard_layout, widget_settings)
                  VALUES ($userId, '$layout', '$widgets')";
    } else {
        $query = "UPDATE user_dashboard SET dashboard_layout='$layout', widget_settings='$widgets' WHERE user_id=$userId";
    }
    
    if ($conn->query($query) === TRUE) {
        echo "Dashboard updated successfully.";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customizable Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .dashboard-config { margin: 20px; }
        label { margin-top: 10px; }
    </style>
</head>
<body>
    <?php if($firstLogin): ?>
    <div class="dashboard-config">
        <h2>Customize Your Dashboard</h2>
        <form action="" method="post">
            <label for="layout">Choose Layout:</label>
            <select id="layout" name="layout">
                <option value="default">Default</option>
                <option value="compact">Compact</option>
                <option value="spacious">Spacious</option>
            </select><br>
            <label>Choose Widgets:</label><br>
            <input type="checkbox" id="guitar" name="widgets[]" value="guitar">
            <label for="guitar">Guitar Tuner</label><br>
            <input type="checkbox" id="metronome" name="widgets[]" value="metronome">
            <label for="metronome">Metronome</label><br>
            <input type="checkbox" id="chords" name="widgets[]" value="chords">
            <label for="chords">Chords Library</label><br>
            <button type="submit">Save Dashboard</button>
        </form>
    </div>
    <?php endif; ?>
</body>
</html>
