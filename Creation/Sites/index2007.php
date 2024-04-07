<?php
// Connect to the MySQL database
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the Wishlist table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS Wishlist (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) NOT NULL,
item_name VARCHAR(255) NOT NULL,
item_description TEXT,
creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table creation success
} else {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Insert new wishlist item
    $user_id = htmlspecialchars($_POST['user_id']);
    $item_name = htmlspecialchars($_POST['item_name']);
    $item_description = htmlspecialchars($_POST['item_description']);

    $stmt = $conn->prepare("INSERT INTO Wishlist (user_id, item_name, item_description) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $item_name, $item_description);
    
    if($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt . "<br>" . $conn->error;
    }

    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wishlist Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type=text], input[type=number] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Add to Wishlist</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="user_id">User ID:</label>
        <input type="number" id="user_id" name="user_id" required>
        
        <label for="item_name">Item Name:</label>
        <input type="text" id="item_name" name="item_name" required>
        
        <label for="item_description">Item Description:</label>
        <input type="text" id="item_description" name="item_description">
        
        <input type="submit" value="Add to Wishlist">
    </form>
</div>
</body>
</html>
