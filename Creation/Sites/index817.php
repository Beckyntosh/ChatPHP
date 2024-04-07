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

try {
    $pdo = new PDO($dsn, $user, $pass, $opt);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>High-Tech Horizon - Hotel Search</title>
    <style type="text/css">
        body{ font-family: Arial, Verdana, sans-serif; }
        .wrapper{ width: 600px; margin: 0 auto; }

        /* High-Tech Horizon theme styles */
        body {
            background-color: #000;
            color: #0f0;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <h2>Search Hotels</h2>
    <p>Please enter the hotel name:</p>
    <form action="#">
        <input type="text" name="hotel_name" id="hotel_name">
        <input type="submit" value="Search">
    </form>

    <?php
    if (isset($_GET['hotel_name'])) {
        $hotel_name = $_GET['hotel_name'];
        $stmt = $pdo->prepare('SELECT * FROM hotels WHERE name LIKE ?');
        $stmt->execute([$hotel_name . '%']);
        $hotels = $stmt->fetchAll();

        if ($hotels) {
            echo '<ul>';
            foreach ($hotels as $hotel) {
                echo '<li>' . htmlspecialchars($hotel['name']) . ' - ' . htmlspecialchars($hotel['location']) . '</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>No hotels found...</p>';
        }
    }
    ?>
</div>
</body>
</html>