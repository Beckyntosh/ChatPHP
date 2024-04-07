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

// Create tables for users and loyalty program if they don't exist
$createUsersTableQuery = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(255),
    reg_date TIMESTAMP
)";
if (!$mysqli->query($createUsersTableQuery)) {
    die("Error creating users table: " . $mysqli->error);
}

$createLoyaltyProgramTableQuery = "CREATE TABLE IF NOT EXISTS loyalty_program (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    points INT(6) DEFAULT 0,
    status ENUM('active', 'inactive') DEFAULT 'active',
    reg_date TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";
if (!$mysqli->query($createLoyaltyProgramTableQuery)) {
    die("Error creating loyalty program table: " . $mysqli->error);
}

// All-encompassing function to handle user registration including loyalty program opt-in
function registerUserWithLoyaltyOption($mysqli, $userData) {
    $username = $mysqli->real_escape_string($userData['username']);
    $email = $mysqli->real_escape_string($userData['email']);
    $password = password_hash($userData['password'], PASSWORD_DEFAULT);
    $optInLoyalty = $userData['loyalty_program'] == 'yes' ? true : false;

    // Start transaction
    $mysqli->begin_transaction();

    try {
        // Insert user into users table
        $userInsertQuery = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        $mysqli->query($userInsertQuery);
        $userId = $mysqli->insert_id;

        // If opted in for loyalty program
        if ($optInLoyalty) {
            $loyaltyInsertQuery = "INSERT INTO loyalty_program (user_id, points, status) VALUES ('$userId', 0, 'active')";
            $mysqli->query($loyaltyInsertQuery);
        }

        // Commit transaction
        $mysqli->commit();
    } catch (Exception $e) {
        // Rollback transaction on error
        $mysqli->rollback();
        die("Error during registration: " . $e->getMessage());
    }

    return $userId;
}

// Handle POST request for user registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userData = [
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'loyalty_program' => $_POST['loyalty_program']
    ];
    $userId = registerUserWithLoyaltyOption($mysqli, $userData);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration with Loyalty Program</title>
</head>
<body>
    <h2>Register and Join Our Loyalty Program</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Username: <input type="text" name="username" required><br>
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        Join Loyalty Program? <input type="checkbox" name="loyalty_program" value="yes"><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
<?php
$mysqli->close();
?>
