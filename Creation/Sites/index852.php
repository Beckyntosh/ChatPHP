<?php

$host = 'db';
$db   = 'my_database';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $pass);

$sql = file_get_contents('init.sql');
$pdo->exec($sql);

if(isset($_POST['search'])) {
    $searchQuery = $_POST['search'];
    $stmt = $pdo->prepare("SELECT * FROM podcasts WHERE name LIKE :searchQuery");
    $stmt->execute(['searchQuery' => "%$searchQuery%"]);
    $podcasts = $stmt->fetchAll();
}

if(isset($_FILES['productCatalog'])) {
    $filename = $_FILES['productCatalog']['tmp_name'];
    $data = file_get_contents($filename);
    $products = json_decode($data, true);
    foreach($products as $product){
        $name = $product['name'];
        $description = $product['description'];
        $stmt = $pdo->prepare("INSERT INTO products (name, description) VALUES (:name, :description)");
        $stmt->execute(['name' => $name, 'description' => $description]);
    }
}

if(isset($_POST['email'])) {
    $email = $_POST['email'];
    $stmt = $pdo->prepare("INSERT INTO users (email) VALUES (:email)");
    $stmt->execute(['email' => $email]);

    $headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($email, 'Welcome', 'You are now registered!', $headers);
}

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: #FF7F50;
            color: #FFFFFF;
        }
    </style>
</head>
<body>
    <form method="POST">
        <label for="email">Register</label><br>
        <input type="email" id="email" name="email"><br>
        <input type="submit" value="Register">
    </form>
    <br>
    <form method="POST" enctype="multipart/form-data">
        <label for="productCatalog">Product Catalog</label><br>
        <input type="file" id="productCatalog" name="productCatalog"><br>
        <input type="submit" value="Upload">
    </form>
    <br>
    <form method="POST">
        <label for="search">Search Podcasts</label><br>
        <input type="text" id="search" name="search">
        <input type="submit" value="Search">
    </form>
    <?php
    if(isset($podcasts)) {
        echo "<h2>Results</h2>";
        foreach ($podcasts as $podcast){
            echo "<p>{$podcast['name']} - {$podcast['description']}</p>";
        }
    }
    ?>
</body>
</html>