<?php
// Establishing connection to the database
$servername = "db";
$database = "my_database";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create widget positions table if not exists
$widgetsTableSql = "CREATE TABLE IF NOT EXISTS user_widgets (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
widget_name VARCHAR(30) NOT NULL,
position INT(6),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($widgetsTableSql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Create users table if not exists
$usersTableSql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
first_login BOOLEAN DEFAULT 1,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($usersTableSql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Dummy User insertion, REPLACE with your authentication mechanism
$dummyUser = "INSERT INTO users (username, password, first_login) VALUES ('user', '".md5("pass")."', 1)";
if ($conn->query($dummyUser) === TRUE) {
    // echo "New record created successfully";
} else {
    // Uncomment in development environment
    // echo "Error: " . $dummyUser . "<br>" . $conn->error;
}

session_start();

// User Login POST handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT id, first_login FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['first_login'] = $row['first_login'];
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "Invalid login";
    }
}

// User Widget Update Handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateWidgets'])) {
    $userId = $_SESSION['user_id'];
    // Assuming widgets are submitted as widgetName => position
    foreach ($_POST as $widgetName => $position) {
        if ($widgetName != 'updateWidgets') {
            $sql = "INSERT INTO user_widgets (user_id, widget_name, position) VALUES ('$userId', '$widgetName', '$position')";
            if (!$conn->query($sql) === TRUE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    // Update user first login status
    $updateFirstLoginSql = "UPDATE users SET first_login = 0 WHERE id = '$userId'";
    if (!$conn->query($updateFirstLoginSql) === TRUE) {
        echo "Error updating record: " . $conn->error;
    }

    $_SESSION['first_login'] = 0; // Update session
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// HTML & PHP mixture for UI logic
?>
<!DOCTYPE html>
<html>
<head>
    <title>Customizable Dashboard</title>
    <style>
        .widget { margin: 10px; padding: 20px; border: 1px solid #cccccc; border-radius: 5px; }
    </style>
</head>
<body>

<?php if (!isset($_SESSION['user_id'])): ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
<?php else: ?>
    <?php if ($_SESSION['first_login']): ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div>
                <label>Widget Order</label><br>
                <input type="text" name="widget1" placeholder="Position for Widget 1"><br>
                <input type="text" name="widget2" placeholder="Position for Widget 2"><br>
                <input type="text" name="widget3" placeholder="Position for Widget 3"><br>
                <input type="submit" name="updateWidgets" value="Save Dashboard">
            </div>
        </form>
    <?php else: ?>
        <div>Your Custom Dashboard</div>
        <?php
        $userId = $_SESSION['user_id'];
        $sql = "SELECT widget_name, position FROM user_widgets WHERE user_id = '$userId' ORDER BY position ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='widget'>" . $row['widget_name'] . "</div>";
            }
        } else {
            echo "No widgets found.";
        }
        ?>
    <?php endif; ?>
<?php endif; ?>

</body>
</html>
<?php
$conn->close();
?>
