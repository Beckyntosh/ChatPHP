<?php
// Define database connection parameters
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DATABASE', 'my_database');
define('MYSQL_SERVER', 'db');

// Establish database connection
$mysqli = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Create tables for forum users if they don't exist, designed for interoperability with other systems
$createForumUsersTableQuery = "CREATE TABLE IF NOT EXISTS forum_users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL UNIQUE,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    favorite_child_clothing_brand VARCHAR(50),
    join_date TIMESTAMP
)";
if (!$mysqli->query($createForumUsersTableQuery)) {
    die("Error creating forum users table: " . $mysqli->error);
}

// Function to register a user for the forum with an emphasis on interoperability
function registerForumUser($mysqli, $userDetails) {
    $username = $mysqli->real_escape_string($userDetails['username']);
    $email = $mysqli->real_escape_string($userDetails['email']);
    // Use password hashing for security
    $password = password_hash($userDetails['password'], PASSWORD_DEFAULT);
    $favorite_child_clothing_brand = $mysqli->real_escape_string($userDetails['favorite_child_clothing_brand']);

    // Prepare SQL to insert a new forum user
    $stmt = $mysqli->prepare("INSERT INTO forum_users (username, email, password, favorite_child_clothing_brand) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $password, $favorite_child_clothing_brand);
    
    // Execute and close statement
    if (!$stmt->execute()) {
        die("Error registering user: " . $stmt->error);
    }
    $stmt->close();

    // Here, you can add additional code to interoperate with other systems, like sending user data to CRM or marketing tools
}

// Handle POST request for forum registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userDetails = [
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'favorite_child_clothing_brand' => $_POST['favorite_child_clothing_brand']
    ];
    registerForumUser($mysqli, $userDetails);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Children's Clothing Forum Registration</title>
</head>
<body>
    <h2>Join Our Children's Clothing Discussion Forum</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Username: <input type="text" name="username" required><br>
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        Favorite Children's Clothing Brand: <input type="text" name="favorite_child_clothing_brand"><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
<?php
$mysqli->close();
?>
