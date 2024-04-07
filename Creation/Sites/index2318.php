<?php
// Simple single-file approach to implement a registration form with loyalty program signup for an e-commerce website.
// Note: This example lacks proper security measures like prepared statements for SQL queries, CSRF protection, and input validation/sanitization for brevity and clarity, which are crucial for production code.

$host = 'db';
$username = 'root';
$password = 'root';
$dbname = 'my_database';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If form is submitted, process the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password']; // Insecure. Always use password hashing in real applications.
    $email = $_POST['email'];
    $loyalty_signup = isset($_POST['loyalty_signup']) ? 1 : 0;

    // Insert user into database
    $sql = "INSERT INTO users (username, password, email, loyalty_member) VALUES ('$username', '$password', '$email', '$loyalty_signup')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Create users table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50),
    loyalty_member TINYINT(1) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Board Games Website - Loyalty Program Signup</title>
<style>
    body { font-family: Arial, sans-serif; }
    .container { max-width: 600px; margin: auto; padding: 20px; }
    label, input { display: block; margin-bottom: 10px; }
    input[type=text], input[type=password], input[type=email] { width: 100%; padding: 8px; }
    input[type=submit] { padding: 10px 15px; background-color: #007bff; color: white; border: none; cursor: pointer; }
    input[type=submit]:hover { background-color: #0056b3; }
</style>
</head>
<body>
<div class="container">
    <h2>Register & Join Our Loyalty Program</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label>
            <input type="checkbox" name="loyalty_signup" value="1">
            Sign up for the loyalty program
        </label>

        <input type="submit" value="Register">
    </form>
</div>
</body>
</html>
