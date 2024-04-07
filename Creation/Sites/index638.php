<?php
$servername = "db";
$username = "root";
$password = "root";

try{
    $conn = new PDO("mysql:host=$servername;dbname=my_database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$query = $conn->query("SELECT * FROM products");
$products = $query->fetchAll(PDO::FETCH_ASSOC);

foreach($products as $row) {
    echo "<b>Product: </b>".$row['name']."<br>";
    echo "<b>Description: </b>".$row['description']."<br>";
    echo "<b>Category: </b>".$row['category']."<br>";
    echo "<b>Price $: </b>".$row['price']."<br>";
    echo "<b>Quantity in stock: </b>".$row['stock_quantity']."<br><br>";
}

$query = $conn->query("SELECT * FROM users");
$users = $query->fetchAll(PDO::FETCH_ASSOC);

foreach($users as $row) {
    echo "<b>Username: </b>".$row['username']."<br>";
    echo "<b>Name: </b>".$row['name']."<br>";
    echo "<b>E-Mail: </b>".$row['email']."<br>";
    echo "<b>Password: </b>".$row['password']."<br><br>";
}

try{
    $conn->exec("CREATE TABLE IF NOT EXISTS subscriptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    purchase_date DATE,
    expiration_date DATE,
    is_active BOOLEAN DEFAULT 1,
    FOREIGN KEY(user_id) REFERENCES users(id),
    FOREIGN KEY(product_id) REFERENCES products(id)
    )");

    $conn->exec("INSERT INTO subscriptions (user_id, product_id, purchase_date, expiration_date) 
    VALUES (1, 1, NOW(), DATE_ADD(NOW(), INTERVAL 1 YEAR)), 
    (2, 2, NOW(), DATE_ADD(NOW(), INTERVAL 1 YEAR)), 
    (3, 3, NOW(), DATE_ADD(NOW(), INTERVAL 1 YEAR))");

} catch(PDOException $e) {
    echo "Creation failed: " . $e->getMessage();
}

$query = $conn->query("SELECT * FROM subscriptions");
$subscriptions = $query->fetchAll(PDO::FETCH_ASSOC);

foreach($subscriptions as $row) {
    echo "<b>Subscription ID: </b>".$row['id']."<br>";
    echo "<b>User ID: </b>".$row['user_id']."<br>";
    echo "<b>Product ID: </b>".$row['product_id']."<br>";
    echo "<b>Purchase Date: </b>".$row['purchase_date']."<br>";
    echo "<b>Expiration Date: </b>".$row['expiration_date']."<br>";
    $active = $row['is_active'] ? "Active" : "Inactive";
    echo "<b>Status: </b>".$active."<br><br>";
}

$conn = null;
?>
