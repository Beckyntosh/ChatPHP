<?php
// Check if mysqli is installed
if (!function_exists('mysqli_connect')) {
  die('This script needs the MySQLi PHP extension. Please install or enable it.');
}

// DB Connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'my_database');

// Establish connection to the MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Check connection
if ($conn -> connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$createTables = "
  CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  password VARCHAR(30) NOT NULL,
  reg_date TIMESTAMP
  );

  CREATE TABLE IF NOT EXISTS browsing_history (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(6) UNSIGNED,
  product_id INT(6) UNSIGNED,
  viewed_at TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id)
  );

  CREATE TABLE IF NOT EXISTS products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  category VARCHAR(30) NOT NULL
  );
";
if (!mysqli_multi_query($conn, $createTables)) {
    echo "Error creating tables: " . mysqli_error($conn);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Insert user into the database
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Toy Recommendation System</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 800px; margin: auto; padding: 20px; }
        form { margin-bottom: 20px; }
        input, button { padding: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Signup for Toy Recommendations</h2>
        <form method="POST" action="">
            <input type="text" placeholder="Username" name="username" required>
            <input type="password" placeholder="Password" name="password" required>
            <button type="submit">Signup</button>
        </form>
        <h3>Recommended Toys for You</h3>
        <ul>
            <?php
            // Sample Recommendation Logic (Static for Demo)
            $recommendations = ['Teddy Bear', 'Lego Set', 'RC Car'];

            foreach ($recommendations as $toy) {
                echo "<li>$toy</li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>
<?php
// Close database connection
$conn->close();
?>
