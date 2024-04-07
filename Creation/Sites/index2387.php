<?php
// Define database connection parameters
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DATABASE', 'my_database');
define('MYSQL_SERVER', 'db');

// Establish database connection
$mysqli = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Create tables for storing user data, browsing history, and recommendations if they don't exist
$createUsersTableQuery = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$mysqli->query($createUsersTableQuery);

$createBrowsingHistoryTableQuery = "CREATE TABLE IF NOT EXISTS browsing_history (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_id INT(6) UNSIGNED,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";
$mysqli->query($createBrowsingHistoryTableQuery);

$createRecommendationsTableQuery = "CREATE TABLE IF NOT EXISTS recommendations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_id INT(6) UNSIGNED,
    reason VARCHAR(255),
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";
$mysqli->query($createRecommendationsTableQuery);

// Brave function to generate personalized recommendations
function generateRecommendations($mysqli, $userId) {
    // Fetch user's browsing history
    $query = "SELECT product_id, COUNT(product_id) AS view_count FROM browsing_history WHERE user_id = ? GROUP BY product_id ORDER BY view_count DESC LIMIT 5";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    $recommendedProducts = [];
    while ($row = $result->fetch_assoc()) {
        // This is a simplified logic for demonstration. A real-world scenario would involve more complex algorithms.
        // For instance, recommend products that are often viewed together with the products the user has shown interest in.
        $productId = $row['product_id'] + 1; // Simulating recommendation logic
        array_push($recommendedProducts, $productId);
    }

    // Store recommendations
    foreach ($recommendedProducts as $productId) {
        $reason = "Customers interested in the products you viewed also liked this.";
        $insertQuery = "INSERT INTO recommendations (user_id, product_id, reason) VALUES (?, ?, ?)";
        $insertStmt = $mysqli->prepare($insertQuery);
        $insertStmt->bind_param("iis", $userId, $productId, $reason);
        $insertStmt->execute();
    }
}

// Example call (in a real application, $userId would be dynamically determined based on the logged-in user)
if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];
    generateRecommendations($mysqli, $userId);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personalized Gardening Tool Recommendations</title>
</head>
<body>
    <h2>Recommended for You</h2>
    <?php
    if (isset($_GET['userId'])) {
        $userId = $_GET['userId'];
        $getRecommendationsQuery = "SELECT r.product_id, r.reason FROM recommendations r WHERE r.user_id = ? ORDER BY r.timestamp DESC";
        $stmt = $mysqli->prepare($getRecommendationsQuery);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            echo "<p>Product ID: " . $row['product_id'] . " - " . $row['reason'] . "</p>";
        }
    } else {
        echo "<p>Please provide a user ID to see personalized recommendations.</p>";
    }
    ?>
</body>
</html>
<?php
$mysqli->close();
?>
