<?php
// Setup the database connection
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

// Create tables if not exists
$createUsersTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP
)";

$conn->query($createUsersTable);

$createHistoryTable = "CREATE TABLE IF NOT EXISTS browsing_history (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_id INT(6),
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

$conn->query($createHistoryTable);

$createProductsTable = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(50),
    category VARCHAR(50)
)";

$conn->query($createProductsTable);

// Handle the signup form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // password is hashed for security purposes

    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Recommender function: ideally should use user preferences or past history
// This is a simple simulation
function recommendProducts($conn) {
    $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 3";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>Recommended Products for You</h3>";
        while($row = $result->fetch_assoc()) {
            echo "<p>".$row["product_name"]." - ".$row["category"]."</p>";
        }
    } else {
        echo "No products found";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup for Personalized Product Recommendations</title>
</head>
<body>

<h2>Signup for Personalized Recommendations</h2>

<form method="post" action="">
  Email:<br>
  <input type="text" name="email">
  <br>
  Password:<br>
  <input type="password" name="password">
  <br><br>
  <input type="submit" name="signup" value="Signup">
</form>

<?php recommendProducts($conn); ?>

</body>
</html>

<?php
$conn->close();
?>