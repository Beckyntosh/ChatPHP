<?php
// Database connection setup
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

// Create users table if not exists
$createUsersTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
)";
$conn->query($createUsersTable);

// Create browsing_history table if not exists
$createBrowsingHistoryTable = "CREATE TABLE IF NOT EXISTS browsing_history (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_viewed VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES users(id)
)";
$conn->query($createBrowsingHistoryTable);

// Create products table if not exists
$createProductsTable = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(50),
    description TEXT,
    category VARCHAR(50)
)";
$conn->query($createProductsTable);

// Sample HTML frontend
?>
<!DOCTYPE html>
<html>
<head>
    <title>Funky Bicycles - Personalized Recommendations</title>
</head>
<body>
    <h2>Welcome to Funky Bicycles!</h2>
    <form method="POST">
        Username: <input type="text" name="username"><br>
        <input type="submit" value="Sign Up/Register">
    </form>
<?php
// Handle user registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['username'])) {
    $username = $_POST['username'];
    $stmt = $conn->prepare("INSERT INTO users (username) VALUES (?)");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $user_id = $stmt->insert_id;

    echo "<h3>Hi, " . $username . "! Check out these recommendations based on your history!</h3>";

    // Assuming the browsing history is being tracked elsewhere and added to browsing_history table
    // Fetching recommended products
    $recQuery = "SELECT p.product_name, p.description FROM products p JOIN browsing_history bh ON p.category = (SELECT category FROM products WHERE product_name = bh.product_viewed LIMIT 1) WHERE bh.user_id = $user_id GROUP BY p.product_name";
    $recResult = $conn->query($recQuery);

    if ($recResult->num_rows > 0) {
        // output data of each row
        while($row = $recResult->fetch_assoc()) {
            echo "<p><b>".$row["product_name"].":</b> " . $row["description"]. "</p>";
        }
    } else {
        echo "<p>No product recommendations for you yet. Start browsing our bicycle range to get recommendations!</p>";
    }
}
?>

</body>
</html>

<?php
$conn->close();
?>
