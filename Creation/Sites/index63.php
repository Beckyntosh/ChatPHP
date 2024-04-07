<?php
// Connect to Database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create products table if not exists
$createTableSql = "CREATE TABLE IF NOT EXISTS products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  category VARCHAR(50),
  price DECIMAL(10,2) NOT NULL,
  rating FLOAT,
  reg_date TIMESTAMP
  )";

if ($conn->query($createTableSql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// HTML and PHP to display Products
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Handbags E-commerce Site</title>
  <style>
      body, html { font-family: Arial, sans-serif; margin: 0; padding: 0; }
      .container { padding: 20px; }
      .filters { margin-bottom: 20px; }
      .product { margin-bottom: 10px; padding: 10px; border: 1px solid #ddd; }
  </style>
</head>
<body>
  <div class="container">
    <h1>Search Handbags</h1>
    <form action="" method="get" class="filters">
        <input type="text" name="search" placeholder="Keyword">
        <select name="category">
            <option value="">Select Category</option>
            <?php
            $categoriesQuery = "SELECT DISTINCT category FROM products ORDER BY category ASC";
            $categoriesResult = $conn->query($categoriesQuery);
            while($row = $categoriesResult->fetch_assoc()) {
              echo '<option value="'.htmlspecialchars($row['category']).'">'.htmlspecialchars($row['category']).'</option>';
            }
            ?>
        </select>
        <input type="number" name="min_price" placeholder="Min Price">
        <input type="number" name="max_price" placeholder="Max Price">
        <button type="submit">Search</button>
    </form>
    <?php
    $searchSql = "SELECT * FROM products WHERE 1";

    if (!empty($_GET['search'])) {
      $searchSql .= " AND name LIKE '%" . $conn->real_escape_string($_GET['search']) . "%'";
    }
    if (!empty($_GET['category'])) {
      $searchSql .= " AND category = '" . $conn->real_escape_string($_GET['category']) . "'";
    }
    if (!empty($_GET['min_price'])) {
      $searchSql .= " AND price >= " . intval($_GET['min_price']);
    }
    if (!empty($_GET['max_price'])) {
      $searchSql .= " AND price <= " . intval($_GET['max_price']);
    }

    $result = $conn->query($searchSql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo '<div class="product">';
        echo '<h2>'.htmlspecialchars($row['name']).'</h2>';
        echo '<p>Category: '.htmlspecialchars($row['category']).'</p>';
        echo '<p>Price: $'.htmlspecialchars($row['price']).'</p>';
        echo '<p>Rating: '.htmlspecialchars($row['rating']).' / 5</p>';
        echo '</div>';
      }
    } else {
      echo "0 results";
    }
    ?>
  </div>
</body>
</html>
<?php
$conn->close();
?>