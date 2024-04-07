<?php
// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Check if user_table exists, if not create one
try {
    $query = "CREATE TABLE IF NOT EXISTS user_table (
        id INT AUTO_INCREMENT PRIMARY KEY, 
        username VARCHAR(255) NOT NULL, 
        password VARCHAR(255) NOT NULL,
        dashboard_layout VARCHAR(255) DEFAULT 'default',
        first_login TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )  ENGINE=INNODB;";
    $pdo->exec($query);
    echo "Table created successfully.";
} catch (PDOException $e){
    die("ERROR: Could not create table. " . $e->getMessage());
}

// Dummy user details for the example
$username = "dummyUser";
$password = "dummyPass";
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$dashboard_layout = "custom"; // default value for the demo

// Check if it is the user's first login
try {
    $stmt = $pdo->prepare("SELECT first_login FROM user_table WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user) {
        // User Exists, update dashboard layout to custom on their first login
        $update = $pdo->prepare("UPDATE user_table SET dashboard_layout = ? WHERE username = ?");
        $update->execute([$dashboard_layout, $username]);
    } else {
        // Register User
        $stmt = $pdo->prepare("INSERT INTO user_table (username, password, dashboard_layout) VALUES (?, ?, ?)");
        $stmt->execute([$username, $hashed_password, $dashboard_layout]);
    }
} catch (PDOException $e) {
    die("ERROR: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customizable Dashboard</title>
</head>
<body>
    <h1>Welcome to the Customizable Dashboard</h1>
    <p>Select the layout for your dashboard:</p>
    <form action="dashboard_update.php" method="post">
        <select name="layout">
            <option value="default">Default Layout</option>
            <option value="horizontal">Horizontal Layout</option>
            <option value="vertical">Vertical Layout</option>
        </select>
        <input type="submit" value="Save Layout">
    </form>
</body>
</html>
