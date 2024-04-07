<?php
// Define MySQL connection parameters
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

// Create tables if not exists
$sqlUser = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$sqlHistory = "CREATE TABLE IF NOT EXISTS browsing_history (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_id INT(6) UNSIGNED,
    visited_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

$sqlProduct = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    category VARCHAR(50)
)";

$conn->query($sqlUser);
$conn->query($sqlHistory);
$conn->query($sqlProduct);

// Insert demo products if not exists
$products = [
    ['name' => 'Colorful Pencils', 'category' => 'Drawing'],
    ['name' => 'Lively Notebooks', 'category' => 'Writing'],
    ['name' => 'Erasable Pens', 'category' => 'Writing'],
    ['name' => 'Geometry Set', 'category' => 'Mathematics'],
    ['name' => 'Backpack with Cartoon Prints', 'category' => 'Accessories']
];

foreach ($products as $product) {
    $stmt = $conn->prepare("INSERT INTO products (name, category) SELECT * FROM (SELECT ?, ?) AS tmp WHERE NOT EXISTS (SELECT name FROM products WHERE name = ?) LIMIT 1");
    $stmt->bind_param("sss", $product['name'], $product['category'], $product['name']);
    $stmt->execute();
}

// Handle user signup and browsing history
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"])) {
    // Add user
    $stmt = $conn->prepare("INSERT INTO users (username) VALUES (?)");
    $stmt->bind_param("s", $_POST["username"]);
    $stmt->execute();
    $userId = $stmt->insert_id;

    // Simulate browsing history based on user id
    // Normally, you'd have a mechanism to track user browsing and insert into browsing_history
    $stmt = $conn->prepare("INSERT INTO browsing_history (user_id, product_id) VALUES (?, ?)");
    for ($i = 1; $i <= 5; $i++) {
        $stmt->bind_param("ii", $userId, $i);
        $stmt->execute();
    }
}

// Fetch recommendations for a user
$userId = isset($_GET['user_id']) ? (int)$_GET['user_id'] : 0;
$recommendations = [];
if ($userId > 0) {
    $sql = "SELECT p.id, p.name, p.category FROM products p JOIN browsing_history bh ON p.id = bh.product_id WHERE bh.user_id = ? GROUP BY p.id ORDER BY COUNT(bh.product_id) DESC LIMIT 5";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $recommendations[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personalized Recommendations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007bff;
        }
        .product {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #e7f1ff;
            border-left: 5px solid #007bff;
        }
        .product h2 {
            margin: 0;
            font-size: 20px;
        }
        .product p {
            margin: 5px 0 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Personalized Recommendations</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="username">Sign up for recommendations:</label><br>
            <input type="text" id="username" name="username" required><br><br>
            <input type="submit" value="Sign Up">
        </form>
        <?php if (!empty($recommendations)): ?>
            <h2>Recommendations for you:</h2>
            <?php foreach ($recommendations as $product): ?>
                <div class="product">
                    <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                    <p>Category: <?php echo htmlspecialchars($product['category']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php elseif ($_SERVER["REQUEST_METHOD"] == "GET" && $userId > 0): ?>
            <p>No recommendations found. Start browsing to get some!</p>
        <?php endif; ?>
    </div>
</body>
</html>
