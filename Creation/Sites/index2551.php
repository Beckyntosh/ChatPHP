
<?php
// Check if MySQL extension is loaded
if (!extension_loaded('mysqli')) {
    die("MySQLi extension is not loaded. Please enable it to run this application.");
}

// Database credentials
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}

// Create tables if they don't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    dashboard_config TEXT,
    first_login BOOLEAN DEFAULT TRUE
)";

if (!$conn->query($sql)) {
    die("Error creating table: " . $conn->error);
}

// Function to check if user is logging in for the first time
function isFirstLogin($username, $conn) {
    $sql = "SELECT first_login FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($first_login);
    $stmt->fetch();
    $stmt->close();
    return $first_login;
}

// Function to update first login status
function updateFirstLoginStatus($username, $conn) {
    $sql = "UPDATE users SET first_login = FALSE WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->close();
}

// Function to update dashboard configuration
function updateDashboardConfig($username, $config, $conn) {
    $sql = "UPDATE users SET dashboard_config = ? WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $config, $username);
    $stmt->execute();
    $stmt->close();
}

// Handle login and dashboard configuration update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["config"])) {
        $username = $_POST["username"];
        $config = $_POST["config"];
        if (isFirstLogin($username, $conn)) {
            updateDashboardConfig($username, $config, $conn);
            updateFirstLoginStatus($username, $conn);
            echo "Dashboard updated successfully.";
        } else {
            echo "This is not your first login.";
        }
    } else {
        echo "Username and configuration are required.";
    }
} else {
    // Display login form
    echo '<form method="POST">
        Username: <input type="text" name="username" required>
        Dashboard Configuration (JSON): <textarea name="config" required></textarea>
        <input type="submit" value="Update Dashboard">
    </form>';
}
?>
