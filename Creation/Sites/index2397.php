<?php
// Database connection settings
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "root");
define("MYSQL_DATABASE", "my_database");
define("MYSQL_SERVER", "db");

function connectToDatabase() {
    $conn = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function createTables($conn) {
    $sqlUsers = "CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP
    )";

    $sqlBrowsingHistory = "CREATE TABLE IF NOT EXISTS browsing_history (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id INT(6) UNSIGNED,
        magazine_id INT(6) UNSIGNED,
        view_date TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id)
    )";

    $sqlMagazines = "CREATE TABLE IF NOT EXISTS magazines (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100) NOT NULL,
        description TEXT,
        published_date TIMESTAMP
    )";

    if ($conn->query($sqlUsers) === TRUE && $conn->query($sqlBrowsingHistory) === TRUE && $conn->query($sqlMagazines) === TRUE) {
        echo "Tables created successfully.";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

function getRecommendations($conn, $userId) {
    $sql = "SELECT magazines.title, magazines.description FROM magazines
            JOIN browsing_history ON magazines.id = browsing_history.magazine_id
            WHERE browsing_history.user_id = ?
            GROUP BY magazines.id
            ORDER BY COUNT(magazines.id) DESC
            LIMIT 10";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    $recommendations = [];
    while($row = $result->fetch_assoc()) {
        array_push($recommendations, $row);
    }
    return $recommendations;
}

// Connect to the database and create tables if not exist
$conn = connectToDatabase();
createTables($conn);

// Placeholder for user ID - In a real scenario, this would come from session or user input
$userId = 1;

// Fetch recommendations for the user
$recommendations = getRecommendations($conn, $userId);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazine Recommendations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        .magazine {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Recommended Magazines</h1>
    <div class="recommendations">
        <?php foreach ($recommendations as $magazine): ?>
            <div class="magazine">
                <h2><?= htmlspecialchars($magazine['title']) ?></h2>
                <p><?= htmlspecialchars($magazine['description']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
