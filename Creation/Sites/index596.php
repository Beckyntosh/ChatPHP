<?php
$host = 'db';
$username = 'root';
$password = 'root';
$database = 'my_database';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if tables exist, if not, create them
$tables_to_check = [
    "CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        description TEXT,
        category VARCHAR(100),
        price DECIMAL(10, 2),
        stock_quantity INT
    );",
    "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30),
        name VARCHAR(30),
        email VARCHAR(50),
        password VARCHAR(255)
    );"
];

foreach ($tables_to_check as $query) {
    if (!$conn->query($query)) {
        echo "Error creating table: " . $conn->error;
    }
}

$search_query = '';
$search_results = [];

// Handle form submission
if (isset($_POST['search'])) {
    $search_query = $conn->real_escape_string($_POST['search']);
    $sql = "SELECT * FROM products WHERE name LIKE '%$search_query%' OR description LIKE '%$search_query%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $search_results[] = $row;
        }
    } else {
        $search_results = [];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home Decor Health and Wellness Site</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f9e8;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            overflow: hidden;
        }
        .search-box {
            width: 100%;
            margin: 20px 0;
        }
        .product {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }
        .product img {
            max-width: 100px;
            max-height: 100px;
        }
        header, footer {
            background-color: #cee5d0;
            padding: 10px 0;
            text-align: center;
        }
    </style>
</head>
<body>
<header>
    <h1>Search Profiles - Home Decor Health and Wellness</h1>
</header>

<div class="container">
    <form method="post" class="search-box">
        <input type="text" name="search" placeholder="Search Products..." value="<?php echo htmlspecialchars($search_query); ?>" />
        <button type="submit">Search</button>
    </form>

    <?php if (!empty($search_results)): ?>
        <div>
            <h2>Search Results</h2>
            <?php foreach ($search_results as $product): ?>
                <div class="product">
                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p><?php echo htmlspecialchars($product['description']); ?></p>
                    <p>Category: <?php echo htmlspecialchars($product['category']); ?></p>
                    <p>Price: $<?php echo htmlspecialchars(number_format($product['price'], 2)); ?></p>
                    <p>In Stock: <?php echo htmlspecialchars($product['stock_quantity']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
        <p>No results found for '<?php echo htmlspecialchars($search_query); ?>'.</p>
    <?php endif; ?>
</div>

<footer>
    <p>&copy; 2023 Home Decor Health and Wellness Site</p>
</footer>
</body>
</html>
<?php $conn->close(); ?>