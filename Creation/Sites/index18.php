<?php
// Set database connection
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

// Create tables if they don't exist
$sql = "CREATE TABLE IF NOT EXISTS transport_modes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    mode_name VARCHAR(30) NOT NULL,
    accessibility_options VARCHAR(50),
    UNIQUE KEY unique_mode (mode_name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS routes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    start_point VARCHAR(50) NOT NULL,
    end_point VARCHAR(50) NOT NULL,
    mode_id INT(6) UNSIGNED NOT NULL,
    duration INT NOT NULL,
    cost DECIMAL(5,2) UNSIGNED,
    departure_time DATETIME NOT NULL,
    FOREIGN KEY (mode_id) REFERENCES transport_modes(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;";

$conn->query($sql);

// Handle the search
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $start_point = $_POST['start_point'] ?? '';
    $end_point = $_POST['end_point'] ?? '';
    $searchSQL = "SELECT r.*, m.mode_name, m.accessibility_options FROM routes r
                  INNER JOIN transport_modes m ON r.mode_id = m.id
                  WHERE r.start_point LIKE ?
                  AND r.end_point LIKE ?
                  ORDER BY r.cost, r.duration ASC";

    // Prepare and bind
    $stmt = $conn->prepare($searchSQL);
    $likeStartPoint = '%' . $conn->real_escape_string($start_point) . '%';
    $likeEndPoint = '%' . $conn->real_escape_string($end_point) . '%';
    $stmt->bind_param("ss", $likeStartPoint, $likeEndPoint);

    // Execute and bind result to variables
    $stmt->execute();
    $result = $stmt->get_result();

    $routes = [];
    while($row = $result->fetch_assoc()) {
        $routes[] = $row;
    }
    $stmt->close();
} else {
    $routes = [];
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Public Transport Route Search</title>
<style>
body { font-family: Arial, sans-serif; }
</style>
</head>
<body>
<h1>Search for Public Transport Routes</h1>
<form action="" method="post">
    <label for="start_point">Start Point:</label>
    <input type="text" id="start_point" name="start_point" required>
    <label for="end_point">End Point:</label>
    <input type="text" id="end_point" name="end_point" required>
    <button type="submit">Search</button>
</form>

<?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
    <h2>Search Results</h2>
    <?php if (!empty($routes)): ?>
        <ul>
        <?php foreach ($routes as $route): ?>
            <li>
                <?= htmlspecialchars($route['start_point']) ?> to <?= htmlspecialchars($route['end_point']) ?> by <?= htmlspecialchars($route['mode_name']) ?>
                (<?= $route['duration'] ?> mins, $<?= $route['cost'] ?>, <?= htmlspecialchars($route['accessibility_options']) ?>)
            </li>
        <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No routes found.</p>
    <?php endif; ?>
<?php endif; ?>
</body>
</html>