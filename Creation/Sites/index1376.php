<?php
// Connect to Database
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

// Create table if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(255) NOT NULL,
    customSize VARCHAR(50),
    reg_date TIMESTAMP
)";

if ($conn->query($tableSql) === TRUE) {
    echo "Table Orders created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle Post Request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['productName'];
    $customSize = $_POST['customSize'];

    $stmt = $conn->prepare("INSERT INTO orders (productName, customSize) VALUES (?, ?)");
    $stmt->bind_param("ss", $productName, $customSize);

    if ($stmt->execute()) {
        echo "<p>Order added successfully!</p>";
    } else {
        echo "<p>Error adding order: " . $conn->error . "</p>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Order</title>
</head>
<body>
    <h2>Add a Product Order</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="productName">Product Name:</label><br>
        <input type="text" id="productName" name="productName" value="wooden dining table"><br>
        <label for="customSize">Custom Size:</label><br>
        <input type="text" id="customSize" name="customSize" placeholder="Example: 120x80cm"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
