<?php
// Simplified example for educational purposes - Security & Best Practices need to be considered for a real application

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

// Create tables if they don't exist
$usersTable = "CREATE TABLE IF NOT EXISTS users (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(30) NOT NULL,
	password VARCHAR(30) NOT NULL,
	reg_date TIMESTAMP
)";

$browsingHistoryTable = "CREATE TABLE IF NOT EXISTS browsing_history (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	user_id INT(6) UNSIGNED,
	product_id INT(6) UNSIGNED,
	view_date TIMESTAMP,
	FOREIGN KEY (user_id) REFERENCES users(id)
)";

$productsTable = "CREATE TABLE IF NOT EXISTS products (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL,
	category VARCHAR(50) NOT NULL
)";

$conn->query($usersTable);
$conn->query($browsingHistoryTable);
$conn->query($productsTable);

// Handle POST request for sign up
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']); // Password should be hashed in a real application

    $insertUser = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    
    if ($conn->query($insertUser) === TRUE) {
        echo "New user created successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Dummy data insertion for demo - in a real app, this should be done with actual user interactions
$conn->query("INSERT INTO products (name, category) VALUES ('Laptop X100', 'Electronics'), ('Laptop Y200', 'Electronics') ON DUPLICATE KEY UPDATE name=name");

// Function to get recommendations based on browsing history
function getRecommendations($conn, $userId) {
    $sql = "SELECT p.name, p.category FROM browsing_history bh JOIN products p ON bh.product_id = p.id WHERE bh.user_id = $userId ORDER BY bh.view_date DESC LIMIT 3";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Recommended for you</h2>";
        while($row = $result->fetch_assoc()) {
            echo "<p>" . $row["name"]. " - " . $row["category"]. "</p>";
        }
    } else {
        echo "No recommendations available.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Laptop Recommendations</title>
</head>
<body>

<h1>Welcome to Your Laptop Recommendation System</h1>

<h2>Sign Up</h2>
<form method="post" action="">
    Username: <input type="text" name="username" required>
    Password: <input type="password" name="password" required>
    <input type="submit" value="Sign Up">
</form>

<?php
// Dummy user ID for demonstration, in a real application, you'd use the user's ID from the session
$userId = 1; 
getRecommendations($conn, $userId);
?>

</body>
</html>

<?php $conn->close(); ?>
