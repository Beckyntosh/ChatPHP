<?php

// Connection parameters
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

// Connect to MySQL Database
$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);

$pdo = new PDO(
    "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE, //DSN
    MYSQL_USER, //Username
    MYSQL_PASSWORD, //Password
    $pdoOptions //Options
);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL and bind parameters
    $stmt = $pdo->prepare("INSERT INTO Members (username, password, email) VALUES (:username, :password, :email)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':email', $email);

    if($stmt->execute()){
        echo "<div>Registration successful!</div>";
    } else {
        echo "<div>Registration failed!</div>";
    }
} else {
    // Create users table if it doesn't exist
    $pdo->exec("CREATE TABLE IF NOT EXISTS Members (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        registration_date TIMESTAMP
    )");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration - Online Forum</title>
</head>
<body>

    <h2>Signup For Technology Discussion Forum</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
              
        <button type="submit">Register</button>
    </form> 

</body>
</html>
