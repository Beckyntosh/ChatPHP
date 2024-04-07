<?php
// Setup connection variables
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'my_database');

// Connect to MySQL Database
$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// SQL to create necessary tables
$initSQL = [
    "CREATE TABLE IF NOT EXISTS languages (
        id INT AUTO_INCREMENT PRIMARY KEY,
        code VARCHAR(10),
        name VARCHAR(100)
    );",
    
    "INSERT INTO languages (code, name) VALUES
    ('en', 'English'),
    ('es', 'Spanish'),
    ('fr', 'French')
    ON DUPLICATE KEY UPDATE code=VALUES(code), name=VALUES(name);",
    
    "CREATE TABLE IF NOT EXISTS product_translations (
        product_id INT,
        language_id INT,
        name VARCHAR(255),
        description TEXT,
        FOREIGN KEY (product_id) REFERENCES products(id),
        FOREIGN KEY (language_id) REFERENCES languages(id)
    );"
];

foreach ($initSQL as $sql) {
    if (!$connection->query($sql)) {
        die("Error creating table: " . $connection->error);
    }
}

// Process form
$selectedLanguage = 'en'; // Default language
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['language'])) {
    $selectedLanguage = $_POST['language'];
}

// Fetch products based on selected language
$sql = "SELECT p.id, pt.name, pt.description, p.category, p.price, p.stock_quantity 
        FROM products p
        JOIN product_translations pt ON p.id = pt.product_id
        JOIN languages l ON pt.language_id = l.id
        WHERE l.code = ?";

$stmt = $connection->prepare($sql);
$stmt->bind_param("s", $selectedLanguage);
$stmt->execute();
$result = $stmt->get_result();

// HTML and PHP mixed for output
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shoes Online Marketplace</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }
        .enchanted {
            color: #5d4954;
            background-color: #e2d1e0;
            border: 1px solid #d3c0d2;
            padding: 10px;
            border-radius: 10px;
            margin: 10px 0;
            text-align: center;
        }
        .product {
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .product h2 { color: #5d4954; }
        .product p { color: #666; }
        .product span { font-weight: bold; }
    </style>
</head>
<body>
    <div class="enchanted">
        <h1>Enchanted Elegance - Shoes Marketplace</h1>
        <form action="" method="post">
            <label for="language">Select Language:</label>
            <select id="language" name="language" onchange="this.form.submit()">
                <option value="en" <?= $selectedLanguage == 'en' ? 'selected' : '' ?>>English</option>
                <option value="es" <?= $selectedLanguage == 'es' ? 'selected' : '' ?>>Spanish</option>
                <option value="fr" <?= $selectedLanguage == 'fr' ? 'selected' : '' ?>>French</option>
            </select>
        </form>
    </div>
    <?php while($row = $result->fetch_assoc()): ?>
        <div class="product">
            <h2><?= htmlspecialchars($row['name']) ?></h2>
            <p><?= htmlspecialchars($row['description']) ?></p>
            <p>Category: <span><?= htmlspecialchars($row['category']) ?></span></p>
            <p>Price: <span>$<?= htmlspecialchars($row['price']) ?></span></p>
            <p>Stock Quantity: <span><?= htmlspecialchars($row['stock_quantity']) ?></span></p>
        </div>
    <?php endwhile; ?>
</body>
</html>
<?php
$connection->close();
?>