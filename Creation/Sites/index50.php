<?php

// Database connection settings
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to MySQL database
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS items (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    starting_bid DECIMAL(10,2) NOT NULL,
    provenance VARCHAR(100),
    auction_end TIMESTAMP
)";

if (mysqli_query($link, $sql)) {
    echo "Table items created successfully";
} else {
    echo "Error creating table: " . mysqli_error($link);
}

$sql = "CREATE TABLE IF NOT EXISTS bids (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    item_id INT(6) UNSIGNED NOT NULL,
    bid_amount DECIMAL(10,2) NOT NULL,
    bidder_name VARCHAR(50) NOT NULL,
    bid_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (item_id) REFERENCES items(id) ON DELETE CASCADE
)";

if (mysqli_query($link, $sql)) {
    echo "Table bids created successfully";
} else {
    echo "Error creating table: " . mysqli_error($link);
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['search'])) {
        $searchTerm = mysqli_real_escape_string($link, $_POST['searchTerm']);
        $sql = "SELECT * FROM items WHERE name LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%'";
    }
    // Add other form handling like bidding here
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Antique and Collectibles Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: 0 auto; }
        .item { border: 1px solid #ddd; margin-top: 10px; padding: 10px; }
        .item img { max-width: 100px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Search Antique and Collectibles</h1>
        <form method="POST">
            <input type="text" name="searchTerm" placeholder="Enter search term" required>
            <input type="submit" name="search" value="Search">
        </form>
        
        <?php
            if (!empty($searchTerm)) {
                $result = mysqli_query($link, $sql);
                
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='item'>";
                        // Assuming an 'image' column exists for item images
                        echo "<img src='" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) ."'>";
                        echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";
                        echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                        // Other item details & bidding form can be added here
                        echo "</div>";
                    }
                } else {
                    echo "No items found matching your search criteria.";
                }
            }
        ?>
    </div>
</body>
</html>

<?php
mysqli_close($link);
?>