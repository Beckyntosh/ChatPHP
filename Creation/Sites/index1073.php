<?php
// Define connection variables
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$link = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false) {
    die("ERROR: Could not connect. " . $link->connect_error);
}

// Create ratings table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS healthcare_providers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    provider_name VARCHAR(255) NOT NULL,
    rating DECIMAL(3,2) DEFAULT 0.0,
    total_ratings INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if(!$link->query($sql)) {
    die("ERROR: Could not create table " . $link->error);
}

// Insert or update rating
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["provider_name"]) && isset($_POST["rating"])) {
    $provider_name = $link->real_escape_string(trim($_POST["provider_name"]));
    $rating = floatval($_POST["rating"]);

    // Check if provider already exists
    $check_sql = "SELECT id FROM healthcare_providers WHERE provider_name = '$provider_name'";
    $result = $link->query($check_sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $update_sql = "UPDATE healthcare_providers SET rating = ((rating * total_ratings) + $rating) / (total_ratings + 1), total_ratings = total_ratings + 1 WHERE id = " . $row["id"];
        if(!$link->query($update_sql)) {
            die("ERROR: Could not update rating " . $link->error);
        }
    } else {
        $insert_sql = "INSERT INTO healthcare_providers (provider_name, rating, total_ratings) VALUES ('$provider_name', '$rating', 1)";
        if(!$link->query($insert_sql)) {
            die("ERROR: Could not insert rating " . $link->error);
        }
    }
}

// Fetch all providers to display
$fetch_sql = "SELECT * FROM healthcare_providers ORDER BY created_at DESC";
$providers = $link->query($fetch_sql);

$link->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare Provider Ratings</title>
</head>
<body>
    <h1>Rate Your Healthcare Provider</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="provider_name">Provider Name:</label>
        <input type="text" id="provider_name" name="provider_name" required>
        <label for="rating">Rating:</label>
        <input type="number" id="rating" name="rating" min="1" max="5" step="0.1" required>
        <button type="submit">Submit</button>
    </form>
    
    <h2>Provider Ratings</h2>
    <?php if ($providers->num_rows > 0): ?>
    <ul>
        <?php while($row = $providers->fetch_assoc()): ?>
            <li><?php echo htmlspecialchars($row["provider_name"]) . ' - Rating: ' . $row["rating"]; ?></li>
        <?php endwhile; ?>
    </ul>
    <?php else: ?>
        <p>No ratings yet. Be the first to rate!</p>
    <?php endif; ?>
</body>
</html>
