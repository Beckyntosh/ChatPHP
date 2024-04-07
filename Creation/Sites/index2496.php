<?php
// This script handles both the display of the signup form and processing the signup logic in a single file.
// Adjust MYSQL_ROOT_PSWD, MYSQL_DB, and other database parameters as per your environment.

// Setting variables for database connection
$servername = "db";
$username = "root"; // Default username
$password = "root"; // MYSQL_ROOT_PSWD as specified
$dbname = "my_database"; // MYSQL_DB as specified

// Creating connection to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create users table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(60) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

function createUser($conn, $username, $password, $email) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashedPassword, $email);

    if ($stmt->execute()) {
        echo "<p>Registration successful! Welcome to Premium File Storage, " . htmlspecialchars($username) . ".</p>";
    } else {
        echo "<p>Error: " . htmlspecialchars($username) . " could not be registered.</p>";
    }
    $stmt->close();
}

// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if (!empty($username) && !empty($password) && !empty($email)) {
        createUser($conn, $username, $password, $email);
    } else {
        echo "<p>Please fill in all fields.</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up - Premium File Storage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"], input[type="password"], input[type="email"] {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #5c6bc0;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #3f51b5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up for Access to Premium Features</h2>
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Sign Up">
        </form>
    </div>
</body>
</html>
