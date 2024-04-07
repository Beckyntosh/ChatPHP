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

// Create tables for storing user browsing history and recommendations
$createBrowsingHistoryTableQuery = "CREATE TABLE IF NOT EXISTS user_browsing_history (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid INT(6) UNSIGNED,
    product_id INT(6) UNSIGNED,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$mysqli->query($createBrowsingHistoryTableQuery)) {
    die("Error creating browsing history table: " . $mysqli->error);
}

$createRecommendationsTableQuery = "CREATE TABLE IF NOT EXISTS user_recommendations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid INT(6) UNSIGNED,
    recommended_product_id INT(6) UNSIGNED,
    reason VARCHAR(255),
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$mysqli->query($createRecommendationsTableQuery)) {
    die("Error creating recommendations table: " . $mysqli->error);
}

// Function to generate personalized product recommendations based on browsing history
function generateProductRecommendations($mysqli, $userid) {
    // Simulate a complex algorithm for generating personalized recommendations based on user's browsing history
    // For simplicity, let's assume we recommend products with IDs close to those viewed by the user
    $getBrowsingHistoryQuery = "SELECT product_id FROM user_browsing_history WHERE userid = $userid ORDER BY timestamp DESC LIMIT 10";
    $result = $mysqli->query($getBrowsingHistoryQuery);

    while ($row = $result->fetch_assoc()) {
        // Simulated logic for recommendation
        $recommendedProductId = $row['product_id'] + 1; // Just an example logic
        $reason = "Similar to products you've viewed.";

        // Insert recommendation into database
        $insertRecommendationQuery = "INSERT INTO user_recommendations (userid, recommended_product_id, reason) VALUES ($userid, $recommendedProductId, '$reason')";
        $mysqli->query($insertRecommendationQuery);
    }
}

// Example usage (in a real application, the userid would be obtained from session or similar)
if (isset($_GET['userid'])) {
    $userid = intval($_GET['userid']);
    generateProductRecommendations($mysqli, $userid);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Personalized Recommendations</title>
</head>
<body>
    <h2>Your Personalized Recommendations</h2>
    <?php
    if (isset($_GET['userid'])) {
        $userid = intval($_GET['userid']);
        $getRecommendationsQuery = "SELECT * FROM user_recommendations WHERE userid = $userid ORDER BY timestamp DESC";
        $result = $mysqli->query($getRecommendationsQuery);

        while ($row = $result->fetch_assoc()) {
            echo "<p>Product ID: " . $row['recommended_product_id'] . " - " . $row['reason'] . "</p>";
        }
    } else {
        echo "<p>Please provide a user ID to see recommendations.</p>";
    }
    ?>
</body>
</html>
<?php
$mysqli->close();
?>
