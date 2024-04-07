<?php

// Connection parameters
$host = 'db';
$username = 'root';
$password = 'root';
$database = 'my_database';

// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("mysql:host=$host; dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create tags table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS tags (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL
    );";
    $conn->exec($sql);
    
    // Create product_tags table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS product_tags (
        product_id INT,
        tag_id INT,
        FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
        FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE,
        PRIMARY KEY (product_id, tag_id)
    );";
    $conn->exec($sql);
    
    echo "Tables created successfully.";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Add a new tag
        $tagName = $_POST['tag_name'];
        $sql = "INSERT INTO tags (name) VALUES (:name)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $tagName);
        $stmt->execute();
        
        echo "New tag added successfully.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Tag - Book Pet Adoption and Care Site</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFFAF0;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            background-color: #FFF5EE;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type="text"], button {
            display: block;
            margin: 20px 0;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #E6DBDB;
        }
        button {
            background-color: #DAA520;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #CD853F;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add a New Tag</h2>
        <form method="POST">
            <label for="tag_name">Tag Name:</label>
            <input type="text" id="tag_name" name="tag_name" required>
            <button type="submit">Add Tag</button>
        </form>
    </div>
</body>
</html>