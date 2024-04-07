<?php
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
$sql = file_get_contents("init.sql");
if (!$conn->multi_query($sql)) {
  echo "Failed to initialize database: " . $conn->error;
}

$conn->close();

// Execute search if search term is provided
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

// Connect to database again
$conn = new mysqli($servername, $username, $password, $dbname);

if ($searchTerm !== '') {
  // Simple search in the products table
  $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ? OR description LIKE ?");
  $searchTerm = "%$searchTerm%";
  $stmt->bind_param("ss", $searchTerm, $searchTerm);
  $stmt->execute();
  $result = $stmt->get_result();
} else {
  $result = [];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hair Care Products and Recipe Sharing Site</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #8C9E74;
    color: #4E3620;
}
.container {
    width: 80%;
    margin: auto;
    background-color: #F2EDEB;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}
.product {
    border-bottom: 1px solid #cccccc;
    margin-bottom: 10px;
    padding-bottom: 10px;
}
</style>
</head>
<body>
<div class="container">
    <h2>Search for Hair Care Products</h2>
    <form action="" method="get">
        <input type="text" name="search" placeholder="Enter search term..." value="<?= htmlspecialchars($searchTerm) ?>">
        <button type="submit">Search</button>
    </form>
    <?php if ($searchTerm !== '' && $result->num_rows > 0): ?>
    <h3>Search Results</h3>
    <?php while($row = $result->fetch_assoc()): ?>
        <div class="product">
            <h4><?= htmlspecialchars($row['name']) ?></h4>
            <p><?= htmlspecialchars($row['description']) ?></p>
            <p>Category: <?= htmlspecialchars($row['category']) ?> | Price: $<?= htmlspecialchars($row['price']) ?></p>
        </div>
    <?php endwhile; ?>
    <?php elseif ($searchTerm !== ''): ?>
    <p>No products found.</p>
    <?php endif; ?>
</div>
</body>
</html>
<?php
$conn->close();
?>