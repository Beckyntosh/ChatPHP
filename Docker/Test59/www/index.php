// PARAMETERS: Function: Customizable User Dashboard Creation on First Login: create an example feature for customizing the dashboard on first login. Example: User customizes their dashboard layout and widgets after first login Product: Skateboards Style: protected
<?php
// Connect to database
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if table 'users' exists, if not create it
$checkUsersTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    dashboard_layout VARCHAR(255),
    first_login BOOLEAN DEFAULT TRUE
)";

if ($conn->query($checkUsersTable) !== TRUE) {
    die("Error creating table: " . $conn->error);
}

// Check if table 'widgets' exists, if not create it
$checkWidgetsTable = "CREATE TABLE IF NOT EXISTS widgets (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    widget_type VARCHAR(50) NOT NULL,
    position INT(5),
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($checkWidgetsTable) !== TRUE) {
    die("Error creating table: " . $conn->error);
}

// Handle user login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Check if user exists
    $sql = "SELECT id, password, first_login FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['password'] === $password) {
            // Handle first login
            if ($row['first_login']) {
                header("Location: customize_dashboard.php?user_id=" . $row['id']);
                exit();
            } else {
                // Redirect to dashboard
                echo "Redirecting to the dashboard...";
            }
        } else {
            echo "Invalid Password!";
        }
    } else {
        echo "User does not exist!";
    }
}

// HTML Form for login
?>

<!DOCTYPE html>
<html>
<head>
    <title>Skateboards Website - Login</title>
</head>
<body>
    <h2>Login to Customize Your Dashboard</h2>
    <form action="" method="post">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>

<?php
$conn->close();
?>
