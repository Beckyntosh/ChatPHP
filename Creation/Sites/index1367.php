<?php
// Database connection settings
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

// Create table if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(50) NOT NULL,
    customSize VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($tableSql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST["productName"];
    $customSize = $_POST["customSize"];

    $stmt = $conn->prepare("INSERT INTO orders (productName, customSize) VALUES (?, ?)");
    $stmt->bind_param("ss", $productName, $customSize);

    if ($stmt->execute() === TRUE) {
        echo "New order created successfully";
    } else {
        echo "Error: " . $stmt->error;
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

<h2>Add Product Order</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Product Name: <input type="text" name="productName" required><br><br>
    Custom Size: <input type="text" name="customSize" required><br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
