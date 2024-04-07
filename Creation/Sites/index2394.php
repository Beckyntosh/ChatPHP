<?php
// Simplified example, please make sure to apply security best practices for production environments

// Database Connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create necessary tables if they don't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    category VARCHAR(50),
    details TEXT
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS browsing_history (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_id INT(6) UNSIGNED,
    view_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// User Signup Handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
    $username = $_POST['username'];
    $sql = "INSERT INTO users (username) VALUES ('$username')";
    
    if ($conn->query($sql) === TRUE) {
        echo "User created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }   
}

// Fetch Recommended Products based on Browsing History
function getRecommendations($userId) {
    global $conn;
    $recommendedProducts = [];
    $sql = "SELECT products.* FROM products JOIN browsing_history ON products.id = browsing_history.product_id WHERE browsing_history.user_id = $userId GROUP BY products.id ORDER BY COUNT(browsing_history.product_id) DESC LIMIT 5";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($recommendedProducts, $row['name'] . " - " . $row['details']);
        }
    }
    return $recommendedProducts;
}

// Example User ID
$userId = 1; // Should ideally come from session or logged-in user context
$recommendations = getRecommendations($userId);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Bath Products Recommendations</title>
    <style>
        body { font-family: Arial, sans-serif; }
    </style>
</head>
<body>

<h2>Product Recommendations for You</h2>
<ul>
    <?php foreach ($recommendations as $product): ?>
        <li><?php echo $product; ?></li>
    <?php endforeach; ?>
</ul>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="username">Signup to get personalized recommendations:</label>
    <input type="text" id="username" name="username" required>
    <input type="submit" value="Signup">
</form>

</body>
</html>
<?php
$conn->close();
?>
