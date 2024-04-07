<?php
// Database connection
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

// Create tables if they don't exist
$sqlUser = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50),
status ENUM('active', 'inactive') NOT NULL,
reg_date TIMESTAMP
)";

$sqlLoyalty = "CREATE TABLE IF NOT EXISTS loyalty_program (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
points INT(10),
FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($sqlUser) === TRUE) {
  echo "Table Users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($conn->query($sqlLoyalty) === TRUE) {
    echo "Table Loyalty Program created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $loyalty = isset($_POST['loyalty']) ? 'active' : 'inactive';
    
    // Insert user into database
    $sql = "INSERT INTO users (username, password, email, status) VALUES ('$username', '$password', '$email', '$loyalty')";
    
    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        echo "New record created successfully. Last inserted ID is: " . $last_id;
        
        // If loyalty program was selected
        if($loyalty == 'active') {
            $sqlLoyaltyInsert = "INSERT INTO loyalty_program (user_id, points) VALUES ('$last_id', 10)"; // Start with 10 points
            
            if ($conn->query($sqlLoyaltyInsert) === TRUE) {
                echo "Welcome to the loyalty program!";
            } else {
                echo "Error: " . $sqlLoyaltyInsert . "<br>" . $conn->error;
            }
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gardening Tools Website - Signup</title>
</head>
<body>
    <h2>Welcome to our funny Gardening Tools website - Join us!</h2>
    <form method="post">
        <label>Username:</label><br>
        <input type="text" name="username"><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br>
        <label>Email:</label><br>
        <input type="email" name="email"><br>
        <input type="checkbox" name="loyalty" value="1"> Join our loyalty program<br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
