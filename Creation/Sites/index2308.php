<?php
// Initialize connection variables
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Create users table with loyalty program column
$createTable = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    join_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    loyalty_member BOOLEAN NOT NULL DEFAULT FALSE
)";

if (!$mysqli->query($createTable)) {
    die("ERROR: Could not able to execute $createTable. " . $mysqli->error);
}

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepare an insert statement
    $sql = "INSERT INTO users (username, password, email, loyalty_member) VALUES (?, ?, ?, ?)";

    if ($stmt = $mysqli->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sssi", $param_username, $param_password, $param_email, $param_loyalty);

        // Set parameters
        $param_username = $_POST['username'];
        $param_password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Creates a password hash
        $param_email = $_POST['email'];
        $param_loyalty = isset($_POST['loyalty_member']) ? 1 : 0;

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            echo '<script>alert("Registration successful!"); window.location.href = "index.php";</script>';
        } else {
            echo "Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }
}

// Close connection
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup for our Laptops Website</title>
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Signup</h2>
        <p>Please fill this form to create an account and join our loyalty program.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>Username</label>
                <input type="text" name="username" required>
            </div>    
            <div>
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <input type="checkbox" name="loyalty_member" value="1">
                <label>Join our loyalty program</label>
            </div>
            <div>
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>    
</body>
</html>
