<?php
// Define connection parameters
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
$createUsersTable = "CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)";

$createEventsTable = "CREATE TABLE IF NOT EXISTS events (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    event_name VARCHAR(255) NOT NULL,
    registration_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)";

if(!$conn->query($createUsersTable) || !$conn->query($createEventsTable)){
    die("ERROR: Could not execute $sql. " . $conn->error);
}

// Process user registration
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        // Validate inputs
        if(!empty($username) && !empty($password)) {
            // Prepare an insert statement
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

            if($stmt = $conn->prepare($sql)){
                $stmt->bind_param("ss", $username, $password_hash);
                
                if($stmt->execute()){
                    echo "You have successfully registered.";
                } else{
                    echo "ERROR: Could not able to execute $sql. " . $conn->error;
                }
                $stmt->close();
            }
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Registration</title>
</head>
<body>
    <h2>User Registration</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label>Username:</label>
            <input type="text" name="username" required>
        </div>    
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <input type="submit" name="register" value="Register">
        </div>
    </form>
</body>
</html>
