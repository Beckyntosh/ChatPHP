<?php
// Set up connection variables
$servername = "db";
$database = "my_database";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create users table if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (!$conn->query($tableSql)) {
    echo "Error creating table: " . $conn->error;
}

// Handle signup
$signupSuccess = false;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['fullname']) && isset($_POST['email'])) {
    $fullname = $conn->real_escape_string($_POST['fullname']);
    $email = $conn->real_escape_string($_POST['email']);

    $insertSql = "INSERT INTO users (fullname, email) VALUES ('$fullname', '$email')";

    if ($conn->query($insertSql) === TRUE) {
        $signupSuccess = true;
    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"], input[type="email"] {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Signup for Our Children's Clothing Service</h2>
        <?php if ($signupSuccess): ?>
        <p class="success">Thank you for signing up!</p>
        <?php else: ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <input type="submit" value="Signup">
        </form>
        <?php endif; ?>
    </div>
</body>
</html>
