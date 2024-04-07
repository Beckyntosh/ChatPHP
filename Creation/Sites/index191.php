<?php
// DB Connection
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

// Create Product Table if not exists
$sql = "CREATE TABLE IF NOT EXISTS Products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Create Comparison Table if not exists
$sql = "CREATE TABLE IF NOT EXISTS Comparison (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productIds VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle Add Product to DB
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addProduct"])) {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    
    $stmt = $conn->prepare("INSERT INTO Products (name, description, price) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $name, $description, $price);
    
    if($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $stmt->close();
}

// Handle Add to Comparison
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addToCompare"])) {
    $productIds = $_POST["productIds"];
    
    $stmt = $conn->prepare("INSERT INTO Comparison (productIds) VALUES (?)");
    $stmt->bind_param("s", $productIds);
    
    if($stmt->execute()) {
        echo "Added to comparison";
    } else {
        echo "Error adding to comparison: " . $stmt->error;
    }
    
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product to Comparison Tool</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Add New Product</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name: <input type="text" name="name" required><br>
        Description:<br> <textarea name="description" rows="4" cols="50"></textarea><br>
        Price: <input type="text" name="price" required><br>
        <input type="submit" name="addProduct" value="Add Product">
    </form>
    
    <h2>Add to Comparison</h2>
    <form method="post" action="">
        Product IDs (comma-separated): <input type="text" name="productIds" required><br>
        <input type="submit" name="addToCompare" value="Add to Compare">
    </form>
</body>
</html>