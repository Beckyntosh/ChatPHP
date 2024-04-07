<?php
// Simple Music and Artist Search Web Application
// Please ensure your environment variables and database credentials are securely managed.
// This example is for instructional purposes.
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    genre VARCHAR(50),
    decade VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table creation success
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle searching
$search = $_GET['search'] ?? '';
$results = [];
if ($search) {
  $sql = "SELECT * FROM artists WHERE genre LIKE ? AND decade='1960s'";
  $stmt = $conn->prepare($sql);
  $likeSearch = "%$search%";
  $stmt->bind_param("s", $likeSearch);
  $stmt->execute();
  $result = $stmt->get_result();
  
  while ($row = $result->fetch_assoc()) {
    $results[] = $row;
  }
  
  $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music and Artists Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .search-results { margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 8px; border-bottom: 1px solid #ddd; }
    </style>
</head>
<body>
    <h1>Search for Jazz Artists from the 1960s</h1>
    <form action="" method="get">
        <input type="text" name="search" placeholder="Enter genre (e.g., Jazz)" value="<?= htmlspecialchars($search) ?>">
        <button type="submit">Search</button>
    </form>
    
    <div class="search-results">
        <h2>Results</h2>
        <?php if (count($results)): ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Genre</th>
                <th>Decade</th>
            </tr>
            <?php foreach ($results as $artist): ?>
                <tr>
                    <td><?= htmlspecialchars($artist['name']) ?></td>
                    <td><?= htmlspecialchars($artist['genre']) ?></td>
                    <td><?= htmlspecialchars($artist['decade']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php else: ?>
        <p>No results found.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
