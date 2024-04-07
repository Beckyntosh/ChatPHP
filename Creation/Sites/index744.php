<?php

// Database configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user table exists, if not create it
$checkUserTable = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(255) NOT NULL
)";

if (!$conn->query($checkUserTable)) {
    echo "Error creating table: " . $conn->error;
}

// Administrator login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Attempt to login
    $sql = "SELECT id, username, password FROM users WHERE username = '$username'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        
        if (password_verify($password, $row['password'])) {
            echo "Login successful! Hello " . $row['username'];
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Username does not exist.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Administrator Login - Organic Foods Environmental Awareness Site</title>
<style>
body {
    background-color: #f3f4f6;
    font-family: Arial, sans-serif;
}

.form-container {
    background-color: white;
    width: 300px;
    margin: 100px auto;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h2 {
    text-align: center;
    color: #333;
}

.input-group {
    margin-bottom: 20px;
}

.input-group input {
    width: calc(100% - 20px);
    padding: 10px;
    margin-top: 5px;
    border-radius: 5px;
    border: 1px solid #ddd;
}

.submit-btn {
    width: 100%;
    padding: 10px;
    background-color: #556b2f;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.submit-btn:hover {
    background-color: #6b8e23;
}

</style>
</head>
<body>

<div class="form-container">
    <h2>Administrator Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="input-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="input-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit" class="submit-btn">Login</button>
    </form>
</div>

</body>
</html>