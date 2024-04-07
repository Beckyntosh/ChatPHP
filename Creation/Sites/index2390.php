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

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS BrowsingHistory (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
product VARCHAR(50),
visit_time TIMESTAMP,
FOREIGN KEY (user_id) REFERENCES Users(id)
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// User sign-up
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"])) {
  $stmt = $conn->prepare("INSERT INTO Users (username) VALUES (?)");
  $stmt->bind_param("s", $_POST["username"]);
  $stmt->execute();
  $stmt->close();
}

// Display form for sign-up
echo '<form method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <input type="submit" value="Sign Up">
      </form>';

// Personalized recommendations based on browsing history
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["username"])) {
  $username = $_GET["username"];
  $stmt = $conn->prepare("SELECT B.product FROM BrowsingHistory B JOIN Users U ON B.user_id = U.id WHERE U.username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();

  echo "<h2>Recommended Products for " . htmlspecialchars($username) . "</h2>";
  if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<p>Product: " . $row["product"] . "</p>";
    }
  } else {
    echo "<p>No product recommendations available. Start browsing to receive recommendations!</p>";
  }
  $stmt->close();
}

$conn->close();
?>
