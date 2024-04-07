<?php

// PHP Block for handling the logic
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
$createTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP
)";

if ($conn->query($createTable) === TRUE) {
    // echo "Table Users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Sign Up User
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $insertSQL = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

    if ($conn->query($insertSQL) === TRUE) {
        $message = "Account created successfully.";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Course Enrollment</title>
</head>
<body>

<h2>Signup For Online Coding Course</h2>

<?php if ($message != ""): ?>
    <p><?= $message; ?></p>
<?php endif; ?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username" required><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" required><br><br>
  <input type="submit" name="signup" value="Sign Up">
</form> 

</body>
</html>
