<?php
// Simple approach (One file for the demo, should be separated into multiple files in a production environment)

$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch categories for the filter options
$categoriesQuery = "SELECT DISTINCT category FROM products";
$categoriesResult = $conn->query($categoriesQuery);

?>
<!DOCTYPE html>
<html>

<head>
  <title>Desktop Computers - Product Search</title>
  <style>
    /* Basic reset and desktop styles */
    body, html {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }
    .container {
      width: 80%;
      margin: auto;
    }
    header {
      background-color: #333;
      color: #fff;
      padding: 10px 0;
      text-align: center;
    }
    .search-panel {
      padding: 20px 0;
    }
    .products {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }
    .product {
      border: 1px solid #ddd;
      padding: 10px;
      width: calc(25% - 20px);
    }
  </style>
</head>

<body>

  <header>
    <h1>Desktop Computers - Product Search</h1>
  </header>

  <div class="container">
    <div class="search-panel">
      <form action="" method="GET">
        <input type="text" name="query" placeholder="Search products..." value="<?= htmlspecialchars($_GET['query'] ?? '') ?>">
        <select name="category">
          <option value="">All Categories</option>
          <?php while ($row = $categoriesResult->fetch_assoc()) : ?>
            <option value="<?= htmlspecialchars($row['category']); ?>" <?= (isset($_GET['category']) && $_GET['category'] === $row['category']) ? 'selected' : ''; ?>>
              <?= htmlspecialchars($row['category']); ?>
            </option>
          <?php endwhile; ?>
        </select>
        <button type="submit">Search</button>
      </form>
    </div>
    <div class="products">
      <?php
      $sql = "SELECT * FROM products WHERE 1";
      if (isset($_GET['query']) && $_GET['query'] != '') {
        $sql .= " AND name LIKE '%" . $conn->real_escape_string($_GET['query']) . "%'";
      }
      if (isset($_GET['category']) && $_GET['category'] != '') {
        $sql .= " AND category = '" . $conn->real_escape_string($_GET['category']) . "'";
      }

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          ?>
          <div class="product">
            <h2><?= htmlspecialchars($row['name']); ?></h2>
            <p>Category: <?= htmlspecialchars($row['category']); ?></p>
            <p>Price: $<?= htmlspecialchars($row['price']); ?></p>
            <p>Rating: <?= htmlspecialchars($row['rating']); ?>/5</p>
          </div>
          <?php
        }
      } else {
        echo "<p>No products found.</p>";
      }
      ?>
    </div>
  </div>

</body>

</html>

<?php $conn->close(); ?>