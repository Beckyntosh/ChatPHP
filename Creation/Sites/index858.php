<?php
// Simple example of a PHP web application with the functionalities mentioned

// Define the database connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'my_database');

// Establish database connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize the database with tables if they do not exist
function initializeDatabase($conn) {
    $initQueries = [
        "CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255),
            description TEXT,
            category VARCHAR(100),
            price DECIMAL(10, 2),
            stock_quantity INT
        )",
        "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30),
            name VARCHAR(30),
            email VARCHAR(50),
            password VARCHAR(255)
        )",
        "CREATE TABLE IF NOT EXISTS favorites (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT,
            product_id INT,
            FOREIGN KEY (user_id) REFERENCES users(id),
            FOREIGN KEY (product_id) REFERENCES products(id)
        )",
        "CREATE TABLE IF NOT EXISTS hotel_search (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT,
            search_query VARCHAR(255),
            search_results TEXT,
            FOREIGN KEY (user_id) REFERENCES users(id)
        )",
        "CREATE TABLE IF NOT EXISTS presentations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT,
            title VARCHAR(255),
            file_path TEXT,
            FOREIGN KEY (user_id) REFERENCES users(id)
        )"
    ];

    foreach ($initQueries as $query) {
        if (!$conn->query($query)) {
            die("Error creating table: " . $conn->error);
        }
    }
}

initializeDatabase($conn);

// Simplified user authentication (without proper security measures)
function isAuthenticated($conn) {
    if (isset($_SESSION['user_id'])) {
        $stmt = $conn->prepare("SELECT id FROM users WHERE id = ?");
        $stmt->bind_param("i", $_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return true;
        }
    }
    return false;
}

// Check for POST variables to handle form submissions
// Handle 3D model upload
if (isset($_FILES["3d_model"])) {
    // Dummy handling - a real application should have file validations
    move_uploaded_file($_FILES["3d_model"]["tmp_name"], "uploads/" . $_FILES["3d_model"]["name"]);
}

// Handle hotel search query
if (isset($_POST["search_hotels"])) {
    $searchQuery = $_POST["hotel_search"];
    // Dummy handling - a real application would perform a database/API query
    // Use $searchQuery to perform the search
}

// Handle presentation upload
if (isset($_FILES["presentation"])) {
    // Dummy handling - a real application should have file validations
    move_uploaded_file($_FILES["presentation"]["tmp_name"], "uploads/" . $_FILES["presentation"]["name"]);
}

// Handle add to favorites functionality
if (isset($_POST["add_to_favorites"]) && isAuthenticated($conn)) {
    $product_id = $_POST["product_id"];
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("INSERT INTO favorites (user_id, product_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $product_id);
    $stmt->execute();
}

// Simple HTML structure with Easter theme
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vitamins Webshop</title>
    <style>
        body {
            background-color: #FCF3CF;
            font-family: Arial, sans-serif;
        }
        .easter-theme {
            color: #FDA7DF; /* Think of easter egg colors */
        }
    </style>
</head>
<body>
    <div class="easter-theme">
        <h1>Welcome to the Vitamins Webshop</h1>

3D Model Upload Form
        <form action="" method="post" enctype="multipart/form-data">
            <label>Upload 3D model:</label><br>
            <input type="file" name="3d_model">
            <input type="submit" value="Upload">
        </form>

Enter platform (Assuming it means log in)
        <form action="" method="post">
            <label>Username:</label><br>
            <input type="text" name="username"><br>
            <label>Password:</label><br>
            <input type="password" name="password"><br>
            <input type="submit" value="Enter Platform">
        </form>

Add to Favorites (Functionality available after authentication)
        <?php if (isAuthenticated($conn)): ?>
        <form action="" method="post">
            <label>Add to Favorites:</label><br>
            <select name="product_id">
                <?php
                $products = $conn->query("SELECT id, name FROM products");
                while($row = $products->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                }
                ?>
            </select><br>
            <input type="submit" name="add_to_favorites" value="Add to Favorites">
        </form>
        <?php endif; ?>

Search Hotels Form
        <form action="" method="post">
            <label>Search Hotels:</label><br>
            <input type="text" name="hotel_search">
            <input type="submit" name="search_hotels" value="Search">
        </form>

Presentation Upload Form
        <form action="" method="post" enctype="multipart/form-data">
            <label>Upload Presentation:</label><br>
            <input type="file" name="presentation">
            <input type="submit" value="Upload">
        </form>

List Products
        <h2>Our Products</h2>
        <div>
            <?php
            $sql = "SELECT id, name, description, price FROM products";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                echo "<div>";
                echo "<h3>" . $row["name"] . "</h3>";
                echo "<p>" . $row["description"] . "</p>";
                echo "<p>Price: $" . $row["price"] . "</p>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>
<?php $conn->close(); ?>