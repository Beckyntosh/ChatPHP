<?php
// Connect to the database
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

// Create tables if they do not exist
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS browsing_history (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
product_id INT(6) UNSIGNED,
FOREIGN KEY (user_id) REFERENCES users(id)
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
genre VARCHAR(30) NOT NULL
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Insert dummy data into products table
// This is for demonstration purposes, you might want to remove or modify this part
$products = [
  "('Minecraft', 'Sandbox')",
  "('Call of Duty', 'Shooter')",
  "('The Witcher 3', 'RPG')",
  "('FIFA 2021', 'Sports')",
  "('Super Mario Odyssey', 'Platformer')"
];
foreach ($products as $product) {
  $sql = "INSERT INTO products (name, genre) VALUES $product";
  if (!$conn->query($sql) === TRUE) {
    echo "Error inserting data: " . $conn->error;
  }
}

// Frontend: Form for user sign-up
echo '<form action="" method="post">
  Username: <input type="text" name="username"><br>
  Email: <input type="email" name="email"><br>
  <input type="submit" value="Sign Up">
</form>';

// Handling user sign-up
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Prepare and bind
  $stmt = $conn->prepare("INSERT INTO users (username, email) VALUES (?, ?)");
  $stmt->bind_param("ss", $username, $email);

  // Set parameters and execute
  $username = $_POST["username"];
  $email = $_POST["email"];
  $stmt->execute();

  echo "User registered successfully";
  $stmt->close();
}

// Function to get personalized recommendations based on browsing history
function getRecommendations($userId, $conn) {
  $sql = "SELECT p.name, p.genre FROM products p
          JOIN browsing_history bh ON p.id = bh.product_id
          WHERE bh.user_id = ?
          GROUP BY p.genre
          ORDER BY COUNT(*) DESC
          LIMIT 3";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $userId);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    echo "<h2>Recommended for you:</h2>";
    while($row = $result->fetch_assoc()) {
      echo $row["name"]." - ".$row["genre"]."<br>";
    }
  } else {
    echo "No recommendations available. Start browsing our products!";
  }
  $stmt->close();
}

// Example call to the recommendation function
// getRecommendations(1, $conn);

$conn->close();
?>
