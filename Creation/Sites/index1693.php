<?php
// DB connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Create Products table if not exist
$createProductsTable = "CREATE TABLE IF NOT EXISTS Products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description TEXT,
    reg_date TIMESTAMP
)";

if ($conn->query($createProductsTable) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert Products Example
$products = [
    ['name' => 'iPhone 13', 'description' => 'Apple iPhone 13 smartphone'],
    ['name' => 'Samsung Galaxy S21', 'description' => 'Samsung Galaxy S21 smartphone']
];

foreach ($products as $product) {
    $stmt = $conn->prepare("INSERT INTO Products (name, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $product['name'], $product['description']);
    $stmt->execute();
}

// Displaying Products for Comparison
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture comparison data
    $product1 = $_POST['product1'];
    $product2 = $_POST['product2'];
    
    // Fetch products details
    $productDetails = [];
    for ($i = 1; $i <= 2; $i++) {
        $productId = ${"product$i"};
        $stmt = $conn->prepare("SELECT name, description FROM Products WHERE id = ?");
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $productDetails[${"product$i"}] = $result->fetch_assoc();
        } else {
            echo "No records matching your query were found.";
        }
    }

    // Display comparison
    echo "<h2>Comparison Result:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Feature</th><th>".$productDetails[$product1]['name']."</th><th>".$productDetails[$product2]['name']."</th></tr>";
    echo "<tr><td>Description</td><td>".$productDetails[$product1]['description']."</td><td>".$productDetails[$product2]['description']."</td></tr>";
    echo "</table>";
}

// Form for selecting products to compare
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Comparison Tool</title>
</head>
<body>

<h1>Compare Smartphones</h1>

<form method="post">
    <label for="product1">Choose a smartphone:</label>
    <select name="product1" id="product1">
        <?php
        $result = $conn->query("SELECT id, name FROM Products");
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
            }
        } else {
            echo "<option>No products found</option>";
        }
        ?>
    </select>
    <label for="product2">Compare with:</label>
    <select name="product2" id="product2">
        <?php
        $result->data_seek(0); // Reset result pointer
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
            }
        } else {
            echo "<option>No products found</option>";
        }
        ?>
    </select>
    
    <input type="submit" value="Compare">
</form>

</body>
</html>

<?php
$conn->close();
?>
