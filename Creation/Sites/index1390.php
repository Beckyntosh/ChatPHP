<?php
$mysql_password = "root";
$servername = "db";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, "root", $mysql_password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if table exists, if not create one
$tableCheckSql = "SHOW TABLES LIKE 'orders'";
$result = $conn->query($tableCheckSql);

if ($result->num_rows == 0) {
    $sql = "CREATE TABLE orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(255) NOT NULL,
    customSize VARCHAR(255),
    reg_date TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table Orders created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Add an order
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST["productName"];
    $customSize = $_POST["customSize"];

    $stmt = $conn->prepare("INSERT INTO orders (productName, customSize) VALUES (?, ?)");
    $stmt->bind_param("ss", $productName, $customSize);
    $stmt->execute();

    echo "New record created successfully";
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add an Order</title>
</head>
<body>

<h2>Order Form</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Product name:<br>
  <input type="text" name="productName" required>
  <br>
  Custom size:<br>
  <input type="text" name="customSize" required>
  <br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>
