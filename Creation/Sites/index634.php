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

$query = $pdo->prepare('SELECT * FROM products WHERE name LIKE ?');
$query->execute(["%$search%"]);
$results = $query->fetchAll();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Makeup Webshop</title>
    <style>
        body{ font-family: Arial; background-color: pink; }
        form{ width:200px; margin:20px auto; }
        ul{ list-style-type: none; }
    </style>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="search" placeholder="Search..." value="<?= htmlspecialchars($search, ENT_QUOTES) ?>">
        <input type="submit" value="Search">
    </form>

    <?php if ($search !== '' && empty($results)): ?>
        <p>No results found for "<?= htmlspecialchars($search) ?>"</p>
    <?php elseif ($results): ?>
        <ul>
            <?php foreach ($results as $prod): ?>
                <li><?= htmlspecialchars($prod['name']) ?>: $<?= $prod['price'] ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>