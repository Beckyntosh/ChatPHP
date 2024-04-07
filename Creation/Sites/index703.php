<?php
// Database connection parameters
$dbHost = 'db';
$dbUsername = 'root';
$dbPassword = 'root';
$dbName = 'my_database';

// Create connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create products and users tables if they don't exist
$initSQL = file_get_contents('init.sql');
if (!$conn->multi_query($initSQL)) {
    echo "Error creating tables: " . $conn->error;
}

// Close and reopen the connection to ensure multi_query processing is complete
$conn->close();
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Handle search
$search = $_GET['search'] ?? '';

if (!empty($search)) {
    $stmt = $conn->prepare("SELECT name, description, price FROM products WHERE name LIKE ? OR description LIKE ?");
    $searchParam = "%" . $search . "%";
    $stmt->bind_param("ss", $searchParam, $searchParam);
    $stmt->execute();
    $result = $stmt->get_result();
    $products = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $products = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forest Fantasy Hair Care Marketplace</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e7f2e9;
            color: #345830;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        header {
            background: #4a8b69;
            color: #ffffff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #077a53 3px solid;
        }

        header a {
            color: #ffffff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }

        .content {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .product {
            background: #f5f5f5;
            margin: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px #c9c9c9;
        }

        .product h3, .product p {
            margin: 0;
            padding: 2px;
        }

        .search {
            margin-top: 20px;
            text-align: center;
        }

        .search input[type="text"] {
            width: 200px;
            padding: 10px;
        }

        .search input[type="submit"] {
            padding: 10px;
            background-color: #4a8b69;
            border: none;
            color: white;
            cursor: pointer;
        }

        .search input[type="submit"]:hover {
            background-color: #077a53;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Forest Fantasy Hair Care Marketplace</h1>
        </div>
    </header>

    <div class="container search">
        <form action="" method="get">
            <input type="text" name="search" placeholder="Search products..." value="<?= htmlspecialchars($search) ?>">
            <input type="submit" value="Search">
        </form>
    </div>

    <div class="container content">
        <?php if (empty($products)): ?>
            <p>No products found. Try a different search!</p>
        <?php else: ?>
            <?php foreach ($products as $product): ?>
                <div class="product">
                    <h3><?= htmlspecialchars($product['name']) ?></h3>
                    <p><?= htmlspecialchars($product['description']) ?></p>
                    <p>Price: $<?= htmlspecialchars($product['price']) ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>
<?php
$conn->close();
?>