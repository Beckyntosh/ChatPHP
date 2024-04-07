<?php
// Establish connection to the database
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

// Check if "search" form has been submitted
if(isset($_POST['search'])) {
    $search_term = $conn->real_escape_string($_POST['search_term']);
    $search_category = $conn->real_escape_string($_POST['search_category']);
    
    // SQL query based on search
    $sql = "SELECT * FROM products WHERE name LIKE '%$search_term%' AND category='$search_category'";
} else {
    // Default SQL query to display all products
    $sql = "SELECT * FROM products";
}

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enchanted Elegance Bath Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0e6f6;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #8a76ab;
            color: #ffffff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #0779e4 3px solid;
        }
        header h1 {
            text-align: center;
            margin: 0;
            font-size: 24px;
        }
        nav {
            text-align: center;
            padding: 10px 0;
            margin-top: 40px;
        }
        nav a {
            margin: 0 15px;
            text-transform: uppercase;
            font-size: 18px;
            color: #3a3a3a;
            text-decoration: none;
        }
        .search-form {
            margin-top: 20px;
            text-align: center;
        }
        .product-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .product {
            border: 1px solid #ccc;
            margin: 10px;
            padding: 10px;
            width: 30%;
        }
        .product h3 {
            color: #8a76ab;
        }
    </style>
</head>
<body>

<header>
    <h1>Enchanted Elegance Bath Products</h1>
</header>

<nav>
    <a href="#">Home</a> |
    <a href="#">About Us</a> |
    <a href="#">Contact</a>
</nav>

<div class="container">
    <form class="search-form" action="" method="post">
        <input type="text" name="search_term" placeholder="Search for products..." required>
        <select name="search_category">
            <option value="">Select Category</option>
            <option value="Category1">Category1</option>
            <option value="Category2">Category2</option>
            <option value="Category3">Category3</option>
        </select>
        <button type="submit" name="search">Search</button>
    </form>

    <div class="product-list">
        <?php if($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="product">
                    <h3><?= htmlspecialchars($row["name"]); ?></h3>
                    <p><?= htmlspecialchars($row["description"]); ?></p>
                    <p><b>Category:</b> <?= htmlspecialchars($row["category"]); ?></p>
                    <p><b>Price:</b> $<?= htmlspecialchars(number_format($row["price"], 2)); ?></p>
                    <p><b>In Stock:</b> <?= htmlspecialchars($row["stock_quantity"]); ?> units</p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No products found!</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>

<?php
$conn->close();
?>