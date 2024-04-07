<?php

$host = "db";
$db_user = "root";
$db_pass = "root";
$db_name = "my_database";

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$initTablesScripts = [
    "CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        description TEXT,
        category VARCHAR(100),
        price DECIMAL(10, 2),
        stock_quantity INT
    );",

    "INSERT INTO products (name, description, category, price, stock_quantity) VALUES
        ('Product A', 'Description of Product A', 'Category1', 19.99, 100),
        ('Product B', 'Description of Product B', 'Category2', 29.99, 80),
        ('Product C', 'Description of Product C', 'Category1', 39.99, 150),
        ('Product D', 'Description of Product D', 'Category3', 49.99, 200),
        ('Product E', 'Description of Product E', 'Category2', 59.99, 60),
        ('Product F', 'Description of Product F', 'Category3', 69.99, 90);",

    "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30),
        name VARCHAR(30),
        email VARCHAR(50),
        password VARCHAR(255)
    );",

    "INSERT INTO users (username, name, email, password) VALUES
        ('user1', 'User One', 'user1@example.com', 'password1'),
        ('user2', 'User Two', 'user2@example.com', 'password2'),
        ('user3', 'User Three', 'user3@example.com', 'password3');",

    "CREATE TABLE IF NOT EXISTS meetings (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT,
        scheduled_time DATETIME,
        description TEXT,
        FOREIGN KEY (user_id) REFERENCES users(id)
    );"
];

foreach($initTablesScripts as $script) {
    if(!$conn->query($script)) {
        echo "Error creating table: " . $conn->error;
    }
}

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['schedule_meeting'])) {
    $user_id = $_POST['user_id'];
    $scheduled_time = $_POST['scheduled_time'];
    $description = $_POST['description'];
    
    $stmt = $conn->prepare("INSERT INTO meetings (user_id, scheduled_time, description) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $scheduled_time, $description);
    
    if($stmt->execute()) {
        echo "<div>Meeting scheduled successfully.</div>";
    } else {
        echo "<div>Error scheduling meeting: " . $conn->error . "</div>";
    }
    
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Luxe Loft Furniture Meetings</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f3f4f6; color: #333; }
        .container { width: 80%; margin: 20px auto; background-color: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        form { margin-top: 20px; }
        input[type=text], input[type=datetime-local], input[type=number], select { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; }
        input[type=submit] { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 10px 0; border: none; border-radius: 4px; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>
<div class="container">
    <h2>Schedule A Meeting</h2>
    <form method="POST">
        <label for="user_id">User ID:</label>
        <input type="number" id="user_id" name="user_id" required>
        
        <label for="scheduled_time">Scheduled Time:</label>
        <input type="datetime-local" id="scheduled_time" name="scheduled_time" required>
        
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required>
        
        <input type="submit" name="schedule_meeting" value="Schedule Meeting">
    </form>
</div>
</body>
</html>