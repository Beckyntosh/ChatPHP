<?php
// Database connection
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

// Check for search request
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Search query
$sql = "SELECT * FROM products WHERE name LIKE '%$search%' OR description LIKE '%$search%'";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Makeup Webshop - Christmas Special</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff4e6;
            color: #333;
        }
        header {
            background-color: #d4e157;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
        .product {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f7f7f7;
        }
        .search-box {
            text-align: center;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            background-color: #d4e157;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to our Christmas Makeup Webshop!</h1>
    </header>

    <div class="search-box">
        <form method="GET">
            <input type="text" name="search" placeholder="Search for products..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="products">
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="product">
                    <h2><?= htmlspecialchars($row["name"]) ?></h2>
                    <p><?= htmlspecialchars($row["description"]) ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No products found.</p>
        <?php endif; ?>
    </div>

    <div class="footer">
        <p>&copy; <?= date("Y") ?> Makeup Webshop. Happy Holidays!</p>
    </div>
</body>
</html>
<?php
$conn->close();
?>
