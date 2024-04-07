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

// Create tables for forum users if they don't exist, reflecting a post-apocalyptic theme
$createForumUsersTableQuery = "CREATE TABLE IF NOT EXISTS forum_users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nickname VARCHAR(30) NOT NULL UNIQUE,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    affiliation ENUM('survivor', 'wanderer', 'herbalist') DEFAULT 'survivor',
    join_date TIMESTAMP
)";
if (!$mysqli->query($createForumUsersTableQuery)) {
    die("Error creating forum users table: " . $mysqli->error);
}

// Function to register a user for the forum, with a post-apocalyptic twist
function registerForumUser($mysqli, $userDetails) {
    $nickname = $mysqli->real_escape_string($userDetails['nickname']);
    $email = $mysqli->real_escape_string($userDetails['email']);
    $password = password_hash($userDetails['password'], PASSWORD_DEFAULT);
    $affiliation = $mysqli->real_escape_string($userDetails['affiliation']);

    // Insert the new forum user into the database
    $insertUserQuery = "INSERT INTO forum_users (nickname, email, password, affiliation) VALUES ('$nickname', '$email', '$password', '$affiliation')";
    if (!$mysqli->query($insertUserQuery)) {
        die("Error registering user: " . $mysqli->error);
    }
}

// Handle POST request for forum registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userDetails = [
        'nickname' => $_POST['nickname'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'affiliation' => $_POST['affiliation']
    ];
    registerForumUser($mysqli, $userDetails);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Join the Post-Apocalyptic Forum</title>
</head>
<body>
    <h2>Register for the Technology Discussion Forum</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Nickname: <input type="text" name="nickname" required><br>
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        Affiliation: 
        <select name="affiliation">
            <option value="survivor">Survivor</option>
            <option value="wanderer">Wanderer</option>
            <option value="herbalist">Herbalist</option>
        </select><br>
        <input type="submit" value="Join Forum">
    </form>
</body>
</html>
<?php
$mysqli->close();
?>
