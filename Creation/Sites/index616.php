<?php
$host = 'db';
$db = 'my_database';
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

$search = $_POST['search'];

$sql = "SELECT * FROM products WHERE name LIKE :search";
$statement = $pdo->prepare($sql);
$statement->execute(array('search' => "%$search%"));
$results = $statement->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Urban Jungle Bedding Directory</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('jungle.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;  
            background-size: cover;
        }
        h1 {
            color: #443e3e;
            text-transform: uppercase;
            font-size: 30px;
        }
        #container {
            margin: auto;
        }
    </style>
</head>
<body>
    <h1>Urban Jungle Bedding Directory</h1>
    <div id="container">
        <form method="POST">
            <input type="text" name="search">
            <input type="submit" value="Search">
        </form>
        <?php
        if (!empty($results)) {
            echo '<ul>';
            foreach ($results as $result) {
                echo '<li>'. $result['name'] .'</li>';
            }
            echo '</ul>';
        }
        ?>
    </div>
</body>
</html>