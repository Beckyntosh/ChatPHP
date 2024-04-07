Sure, here is a simple script sample written in PHP that would implement a rating system. Please note that this is a simplistic implementation and doesn't include secure coding measures, validation, sanitation and error handling that should be included in a production environment.

<?php
$host = 'db';
$db   = 'my_database';
$user = 'root';
$pass = 'root';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

//Inserts user product rating
if(isset($_POST['userId']) && isset($_POST['productId']) && isset($_POST['rating'])){
    $stmt = $conn->prepare("INSERT INTO ratings (userId, productId, rating) VALUES (:userId, :productId, :rating)");
    $stmt->bindParam(':userId', $_POST['userId']);
    $stmt->bindParam(':productId', $_POST['productId']);
    $stmt->bindParam(':rating', $_POST['rating']);
    $stmt->execute();
}

// HTML Part
echo "
<!DOCTYPE html>
<html>
<head>
    <title>Skateboards Online Comic and Graphic Novel Library</title>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: 'Arial', sans-serif;
        }
        .header {
            text-align: center;
            padding: 10px;
            background-color: #339933;
            color: #fff;
        }
        .product {
            border: 1px solid #ccc;
            margin: 10px;
            padding: 10px;
            background-color: #ffffff;
        }
    </style>
</head>
<body>
    <div class='header'>
        <h1>Skateboards Online Comic and Graphic Novel Library</h1>
    </div>
";

// Fetch product details
$stmt = $conn->prepare("SELECT * FROM products");
$stmt->execute();
$products = $stmt->fetchAll();

foreach($products as $product){
    echo "
        <div class='product'>
            <h2>{$product['name']}</h2>
            <form method='POST'>
                <input type='hidden' name='productId' value='{$product['id']}'>
                <input type='number' name='rating' min='1' max='5'>
                <button type='submit'>Rate!</button>
            </form>
        </div>
    ";
}

echo "
</body>
</html>
";
?>

Please make sure to properly set your database connection details and adjust your field names as per your actual database. This implementation assumes that you have a `ratings` table with `userId`, `productId` and `rating` fields. And for displaying products, it assumes that you already have a `products` table with `id` and `name` fields.