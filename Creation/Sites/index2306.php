<?php
// Define database connection variables
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

// Create USERS table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    subscribe_to_loyalty_program BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql)) {
    die("ERROR: Could not able to execute $sql. " . $conn->error);
}

// Process registration and loyalty program signup
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $username = $conn->real_escape_string($_POST['username']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT); // Creates a password hash
    $email = $conn->real_escape_string($_POST['email']);
    $subscribe = isset($_POST['subscribe_to_loyalty_program']) ? 1 : 0;

    // Prepare an insert statement
    $sql = "INSERT INTO users (username, password, email, subscribe_to_loyalty_program) VALUES ('$username', '$password', '$email', '$subscribe')";

    if($conn->query($sql) === true){
        echo "<script>alert('Registration successful. Welcome to our loyal program!');</script>";
    } else{
        echo "<script>alert('ERROR: Could not execute $sql. " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up - School Supplies</title>
    <style>
        /* Basic styling */
        body { font-family: Arial, sans-serif; background-color: #f5f5f5; }
        .container { width: 350px; padding: 20px; background-color: white; margin: 0 auto; margin-top: 50px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        input[type=text], input[type=password], input[type=email] { width: 100%; padding: 15px; margin: 5px 0 20px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[type=submit] { width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
        label { cursor: pointer; }
    </style>
</head>
<body>

<div class="container">
    <h2>Sign Up</h2>
    <p>Please fill in this form to create an account and join our loyalty program.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <label>
                <input type="checkbox" name="subscribe_to_loyalty_program" checked> Subscribe to our Loyalty Program
            </label>
        </div>
        <div>
            <input type="submit" value="Register">
        </div>
    </form>
</div>

</body>
</html>

<?php
$conn->close();
?>
