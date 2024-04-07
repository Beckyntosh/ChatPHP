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

// Create tables for forum users if they don't exist, with a focus on protection of data
$createForumUsersTableQuery = "CREATE TABLE IF NOT EXISTS forum_users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL UNIQUE,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    interest_in_art ENUM('painting', 'sculpting', 'drawing') DEFAULT 'painting',
    join_date TIMESTAMP,
    privacy ENUM('public', 'private') DEFAULT 'private'
)";
if (!$mysqli->query($createForumUsersTableQuery)) {
    die("Error creating forum users table: " . $mysqli->error);
}

// Function to securely register a user for the forum
function registerForumUser($mysqli, $userDetails) {
    $username = $mysqli->real_escape_string($userDetails['username']);
    $email = $mysqli->real_escape_string($userDetails['email']);
    // Use password hashing for protection
    $password = password_hash($userDetails['password'], PASSWORD_DEFAULT);
    $interest_in_art = $mysqli->real_escape_string($userDetails['interest_in_art']);
    $privacy = $mysqli->real_escape_string($userDetails['privacy']);

    // Insert the new forum user into the database with an emphasis on data protection
    $insertUserQuery = "INSERT INTO forum_users (username, email, password, interest_in_art, privacy) VALUES ('$username', '$email', '$password', '$interest_in_art', '$privacy')";
    if (!$mysqli->query($insertUserQuery)) {
        die("Error registering user: " . $mysqli->error);
    }
}

// Handle POST request for forum registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userDetails = [
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'interest_in_art' => $_POST['interest_in_art'],
        'privacy' => isset($_POST['privacy']) ? 'private' : 'public' // Assuming checkbox for privacy
    ];
    registerForumUser($mysqli, $userDetails);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Art Forum Registration</title>
</head>
<body>
    <h2>Join Our Art Discussion Forum</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Username: <input type="text" name="username" required><br>
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        Interest in Art: 
        <select name="interest_in_art">
            <option value="painting">Painting</option>
            <option value="sculpting">Sculpting</option>
            <option value="drawing">Drawing</option>
        </select><br>
        Privacy: <input type="checkbox" name="privacy" value="private" checked> Keep my profile private<br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
<?php
$mysqli->close();
?>
