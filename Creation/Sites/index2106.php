<?php
// Initializing MySQL connection parameters
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

// Create table for Wishlist if not exist
$sql = "CREATE TABLE IF NOT EXISTS wishlist (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(30) NOT NULL,
    item_price DECIMAL(10, 2) NOT NULL,
    user_id INT(6) UNSIGNED,
    added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handler for adding an item to the wishlist
if(isset($_POST['addItem'])) {
    $itemName = $_POST['itemName'];
    $itemPrice = $_POST['itemPrice'];
    $userId = $_POST['userId']; // Assuming an existing user ID for the demonstration

    $sql = $conn->prepare("INSERT INTO wishlist (item_name, item_price, user_id) VALUES (?, ?, ?)");
    $sql->bind_param("sdi", $itemName, $itemPrice, $userId);

    if ($sql->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $sql->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Wishlist Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #0f0;
        }
        form {
            margin-top: 20px;
        }
        input[type=text], input[type=number] {
            padding: 10px;
            margin: 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            color: #000;
        }
        input[type=submit] {
            width: 20%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
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

<h2>Cyberpunk Shoes Wishlist</h2>

<form action="" method="post">
    <label for="itemName">Shoe Name:</label>
    <input type="text" id="itemName" name="itemName"><br><br>
    <label for="itemPrice">Price:</label>
    <input type="number" step="0.01" id="itemPrice" name="itemPrice"><br><br>
    <label for="userId">User ID:</label>
    <input type="text" id="userId" name="userId"><br><br>
    <input type="submit" name="addItem" value="Add to Wishlist">
</form>

</body>
</html>
