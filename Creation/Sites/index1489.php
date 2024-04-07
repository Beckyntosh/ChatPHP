<?php
define("MYSQL_ROOT_PSWD", "root");
define("MYSQL_DB", "my_database");
define("SERVERNAME", "db");

// Create connection
$conn = new mysqli(SERVERNAME, "root", MYSQL_ROOT_PSWD, MYSQL_DB);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Table creation
$tableSql = "CREATE TABLE IF NOT EXISTS clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($tableSql) === TRUE) {
    echo "Table Clients created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO clients (name, email, phone) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $phone);

    if($stmt->execute()){
        echo "New client added successfully";
    }else{
        echo "Error adding client: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Client to CRM</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; }
        .container { width: 80%; margin: auto; background-color: #fff; padding: 20px; }
        input[type=text], input[type=email], input[type=tel] { width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box; }
        button { background-color: #04AA6D; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%; }
        button:hover { opacity: 0.8; }
    </style>
</head>
<body>

<div class="container">
    <h2>Add New Client</h2>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required>
        
        <button type="submit">Add Client</button>
    </form>
</div>

</body>
</html>
