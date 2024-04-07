<?php
$host = 'db';
$db = 'my_database';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

echo "<body style='background-color: black; color: lime'>";

if (isset($_POST['search'])) {
    $search_term = $_POST['search'];

    $stmt = $pdo->prepare('SELECT * FROM products WHERE product_name LIKE :term');
    $stmt->execute(['term' => "%$search_term%"]);

    $products = $stmt->fetchAll();

    if ($products) {
        echo "<h1>Search Results for '$search_term'</h1>";

        foreach($products as $product) {
            echo "<div style='border: 1px solid white; margin: 10px; padding: 10px;'>";
            echo "<h2>{$product['product_name']}</h2>";
            echo "<p>{$product['product_description']}</p>";
            echo "</div>";
        }
    } else {
        echo "<h1>No results found for '$search_term'</h1>";
    }
} else {
    echo "<h1>Search for a Course:</h1>";
    echo "<form action='' method='POST'>";
    echo "Search Term: <input type='text' name='search' />";
    echo "<input type='submit' value='Search' />";
    echo "</form>";
}

echo "</body>";
?>