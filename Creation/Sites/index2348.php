<?php
// PHP code to handle signup and display content if logged in
session_start();

// Variables for database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create users table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle user signup
if(isset($_POST['signup'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Check if user already exists
    $check = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($check->num_rows > 0) {
        echo "<p>User already exists!</p>";
    } else {
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hash')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Signup successful. Please login to continue.</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Handle login
if(isset($_POST['login'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $user['email'];
            echo "<p>Login successful. Welcome to exclusive content.</p>";
        } else {
            echo "<p>Invalid password.</p>";
        }
    } else {
        echo "<p>User does not exist. Please signup.</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup for Exclusive Content</title>
</head>
<body>

<?php if(!isset($_SESSION['loggedin'])): ?>
    <h2>Signup</h2>
    <form method="post">
        <input type="email" name="email" required placeholder="Enter your email">
        <input type="password" name="password" required placeholder="Enter your password">
        <button type="submit" name="signup">Signup</button>
    </form>
    
    <h2>Login</h2>
    <form method="post">
        <input type="email" name="email" required placeholder="Enter your email">
        <input type="password" name="password" required placeholder="Enter your password">
        <button type="submit" name="login">Login</button>
    </form>
<?php else: ?>
    <p>Welcome to the exclusive content section, <?= htmlspecialchars($_SESSION['email']) ?>.</p>
Display exclusive contents here
    <p>Exclusive Articles and Videos just for our members.</p>
    <a href="logout.php">Logout</a>
<?php endif; ?>

</body>
</html>

<?php
$conn->close();
?>
