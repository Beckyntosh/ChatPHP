<?php
// Config
$dbServername = "db";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "my_database";

// Create connection
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exists
$createTables = "
CREATE TABLE IF NOT EXISTS items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description TEXT,
  starting_bid DECIMAL(10, 2) DEFAULT 0.00,
  provenance TEXT
);

CREATE TABLE IF NOT EXISTS bids (
  id INT AUTO_INCREMENT PRIMARY KEY,
  item_id INT,
  bid_amount DECIMAL(10, 2) DEFAULT 0.00,
  bidder_name VARCHAR(255),
  bid_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (item_id) REFERENCES items(id)
);";

if ($conn->multi_query($createTables)) {
  do {
    if ($result = $conn->store_result()) {
      $result->free();
    }
  } while ($conn->next_result());
}

// Search functionality
$search = $_GET['search'] ?? '';
$items = [];
if (!empty($search)) {
  $stmt = $conn->prepare("SELECT * FROM items WHERE name LIKE CONCAT('%', ?, '%') OR description LIKE CONCAT('%', ?, '%')");
  $stmt->bind_param("ss", $search, $search);
  $stmt->execute();
  $result = $stmt->get_result();
  $items = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Antique and Collectibles Search</title>
</head>
<body>
  <h1>Search for Antiques and Collectibles</h1>
  <form action="" method="get">
    <input type="text" name="search" placeholder="Search items" value="<?= htmlspecialchars($search) ?>">
    <button type="submit">Search</button>
  </form>
  
  <h2>Results</h2>
  <ul>
    <?php foreach ($items as $item): ?>
      <li>
        <h3><?= htmlspecialchars($item['name']) ?></h3>
        <p><?= htmlspecialchars($item['description']) ?></p>
        <p>Starting Bid: $<?= htmlspecialchars($item['starting_bid']) ?></p>
Add link to auction page for bidding, and show provenance where applicable
      </li>
    <?php endforeach; ?>
  </ul>
</body>
</html>
