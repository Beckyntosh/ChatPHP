<?php
$host = 'db';
$db   = 'my_database';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

$search = $_POST['search'] ?? '';

if($search) {
    $stmt = $pdo->prepare('SELECT * FROM products WHERE name LIKE ?');
    $stmt->execute(["%$search%"]);
    $products = $stmt->fetchAll();
} else {
    $products = $pdo->query('SELECT * FROM products')->fetchAll();
}
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        body { 
            background-color: #FFB6C1; 
            font-family: Arial, sans-serif; 
        }
        .products_container {
            display: flex;
            flex-wrap: wrap;
        }
        .product_card {
            background-color: white;
            margin: 15px;
            padding: 20px;
            border-radius: 15px;
            flex-basis: 20%;
            box-shadow: 1px 1px 1px lightpink;
        }
        .product_card img {
            width: 100%;
            height: 180px;
            object-fit: contain;
        }
    </style>
</head>
<body>
<h1>Easter Makeup Webshop</h1>
<br>

<form action="#" method="post">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search" value="<?= htmlspecialchars($search) ?>">
    <input type="submit" value="Go!">
</form>

<br>
<br>

<div class="products_container">
    <?php foreach($products as $product): ?>
        <div class="product_card">
            <img src="<?= htmlspecialchars($product['image_url']) ?>">
            <h2><?= htmlspecialchars($product['name']) ?></h2>
            <p><?= htmlspecialchars($product['description']) ?></p>
            <p><?= htmlspecialchars($product['price']) ?>$</p>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>