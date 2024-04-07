<?php
// Database connection variables
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
$init_sql = file_get_contents('init.sql');
if (!$conn->multi_query($init_sql)) {
    echo "Error creating tables: " . $conn->error;
}

// Search Functionality
$search_query = '';
$results = [];
if (isset($_GET['search'])) {
    $search_query = $conn->real_escape_string($_GET['search']);
    $sql = "SELECT * FROM products WHERE name LIKE '%$search_query%' OR description LIKE '%$search_query%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    } else {
        $results = [];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vitamins Forum - Search</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; }
        .container { width: 90%; margin: auto; }
        header { background-color: #333; padding: 20px; color: #fff; }
        input[type="text"], button { padding: 10px; }
        input[type="text"] { width: calc(100% - 120px); margin-right: 10px; }
        button { background-color: #007BFF; color: #fff; border: none; cursor: pointer; }
        .product { background-color: #fff; margin-bottom: 10px; padding: 20px; box-shadow: 0 0 10px #ccc; }
        .product h3 { margin: 0; }
        .product p { margin: 10px 0; }
        .no-result { text-align: center; padding: 20px; }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Vitamins Forum - Modern Metropolis</h1>
        </div>
    </header>
    <div class="container">
        <form action="" method="get">
            <input type="text" name="search" placeholder="Search for vitamins..." value="<?php echo $search_query; ?>">
            <button type="submit">Search</button>
        </form>
        <?php if (!empty($results)): ?>
            <?php foreach ($results as $product): ?>
                <div class="product">
                    <h3><?php echo $product['name']; ?></h3>
                    <p><?php echo $product['description']; ?></p>
                    <p>Category: <?php echo $product['category']; ?> | Price: $<?php echo $product['price']; ?> | Stock: <?php echo $product['stock_quantity']; ?></p>
                </div>
            <?php endforeach; ?>
        <?php elseif ($_GET): ?>
            <div class="no-result">
                <p>No results found for "<?php echo $search_query; ?>"</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>