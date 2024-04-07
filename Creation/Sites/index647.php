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

$searchValue = $_POST['search'];

$stmt = $pdo->prepare('SELECT * FROM products WHERE productName LIKE :productName');
$stmt->execute(['productName' => '%' . $searchValue . '%']);
$results = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Makeup Webshop - Winter</title>
    <style>
        body {
            background-color: #D6EAF8;
            color: #34495E;
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>
<body>
<form action="" method="post">
    <input type="text" name="search" placeholder="Search for products...">
    <input type="submit" value="Search">
</form>

<?php
if($results) {
    echo '<h2>Search Results:</h2>';
    echo '<ul>';
    foreach($results as $product) {
        echo '<li>' . $product['productName'] . ' - $' . $product['productPrice'] . '</li>';
    }
    echo '</ul>';
} elseif(isset($_POST['search'])) {
    echo '<p>No results found for "'.$searchValue.'"</p>';
}
?>

</body>
</html>