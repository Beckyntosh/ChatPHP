<?php
// Connect to the database
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

// Create Wishlist table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS Wishlist (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_name VARCHAR(50) NOT NULL,
user_id INT(6) NOT NULL,
added_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
UNIQUE KEY unique_wishlist (product_name, user_id)
)";

if ($conn->query($sql) === TRUE) {
    // Table created
} else {
    echo "Error creating table: " . $conn->error;
}

// Process form when POST request is made to the server
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST["productName"];
    $userId = 1; // Static user ID for simplicity
    
    // Insert product into Wishlist
    $insertSql = $conn->prepare("INSERT INTO Wishlist (product_name, user_id) VALUES (?, ?)");
    $insertSql->bind_param("si", $productName, $userId);

    if($insertSql->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $insertSql->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kitchenware Wishlist</title>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 15px;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 100%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px 0 rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add to Wishlist</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="productName">Product Name:</label><br>
            <input type="text" id="productName" name="productName" required><br><br>
            <input type="submit" value="Add to Wishlist">
        </form>
    </div>
</body>
</html>
