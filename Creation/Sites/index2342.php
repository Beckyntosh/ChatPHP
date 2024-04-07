<?php
// Define MySQL connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$table_sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(40) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle user signup
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = sha1($_POST['password']); // Simple hash for password

    $insert_sql = "INSERT INTO users (username, password) VALUES (?, ?)";

    // Prepare and bind
    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("ss", $username, $password);

    // Execute
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup for Exclusive Member-Only Content</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; color: #333; }
        .container { max-width: 600px; margin: 50px auto; background-color: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        form { display: flex; flex-direction: column; }
        label { margin-top: 20px; }
        input[type="text"], input[type="password"] { padding: 10px; margin-top: 5px; }
        button { padding: 10px; background-color: #007bff; color: white; border: none; margin-top: 20px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Signup for Access to Exclusive Content</h2>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Signup</button>
        </form>
    </div>
</body>
</html>
