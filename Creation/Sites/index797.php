<?php
// Database configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they do not exist
$sql = file_get_contents('init.sql');
if (!$conn->multi_query($sql)) {
    echo "Error creating tables: " . $conn->error;
}

// Search functionality
$search = $_POST['search'] ?? '';
$searchResults = [];

if ($search) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ? OR description LIKE ? OR category LIKE ?");
    $likeSearch = "%$search%";
    $stmt->bind_param("sss", $likeSearch, $likeSearch, $likeSearch);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $searchResults[] = $row;
        }
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herbal Supplements Online Comic and Graphic Novel Library</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e3f2fd;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #009688;
            color: #ffffff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #077187 1px solid;
        }
        header h1 {
            text-align: center;
            margin: 0;
            text-transform: uppercase;
        }
        input[type=text], input[type=submit] {
            padding: 10px;
            margin: 10px;
        }
        input[type=submit] {
            cursor: pointer;
            background: #c8e6c9;
            color: #333;
        }
        .product {
            background-color: #f1f8e9;
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Forest Fantasy - Herbal Supplements & Graphic Novels</h1>
    </header>
    <div class="container">
        <section id="search">
            <form method="POST" action="">
                <input type="text" name="search" placeholder="Search Fitness Programs...">
                <input type="submit" value="Search">
            </form>
        </section>
        <section id="results">
            <?php if (!empty($searchResults)) : ?>
                <?php foreach ($searchResults as $product) : ?>
                    <div class="product">
                        <h2><?= htmlspecialchars($product['name']) ?></h2>
                        <p><?= htmlspecialchars($product['description']) ?></p>
                        <p>Category: <?= htmlspecialchars($product['category']) ?></p>
                        <p>Price: $<?= htmlspecialchars(number_format($product['price'], 2)) ?></p>
                        <p>Stock: <?= htmlspecialchars($product['stock_quantity']) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php elseif ($search): ?>
                <p>No results found for "<?= htmlspecialchars($search) ?>"</p>
            <?php endif; ?>
        </section>
    </div>
</body>
</html>