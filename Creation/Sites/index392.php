<?php
// Initialize a session
session_start();

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

// Create tables if they don't exist
$usersTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$historyTable = "CREATE TABLE IF NOT EXISTS browsing_history (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_id INT(6) UNSIGNED,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

$conn->query($usersTable);
$conn->query($historyTable);

// Sign Up
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Simple hashing for demonstration

    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        $_SESSION['loggedIn'] = true;
        $_SESSION['email'] = $email;
        header("Location: ".$_SERVER['PHP_SELF']); // Redirect to avoid form resubmission
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up for Personalized Product Recommendations</title>
</head>
<body>

<?php if(!isset($_SESSION['loggedIn'])): ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" name="signup" value="Sign Up">
    </form>
<?php else: ?>
    <p>Welcome, <?php echo $_SESSION['email']; ?>! Here are your personalized product recommendations.</p>
Logic for product recommendations based on browsing history can be added here
<?php endif; ?>

</body>
</html>

<?php $conn->close(); ?>