<?php
// Initial setup
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

// Create table if not exists
$userTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

$preferencesTable = "CREATE TABLE IF NOT EXISTS preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
camera_types VARCHAR(255),
brands VARCHAR(255),
FOREIGN KEY (user_id) REFERENCES users(id)
)";

$conn->query($userTable);
$conn->query($preferencesTable);

// PHP code to handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $email = $_POST["email"];
  $camera_types = implode(',', $_POST["camera_types"]);
  $brands = implode(',', $_POST["brands"]);

  // Insert user
  $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $username, $password, $email);
  $stmt->execute();
  $user_id = $stmt->insert_id;

  // Insert preferences
  $stmt = $conn->prepare("INSERT INTO preferences (user_id, camera_types, brands) VALUES (?, ?, ?)");
  $stmt->bind_param("iss", $user_id, $camera_types, $brands);
  $stmt->execute();

  echo "Registration Successful";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register for Custom News Feed</title>
</head>

<body>
    <h2>User Registration for Custom News Feed</h2>
    <form method="post" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="camera_types">Preferred Camera Types:</label><br>
        <select multiple id="camera_types" name="camera_types[]">
            <option value="DSLR">DSLR</option>
            <option value="Mirrorless">Mirrorless</option>
            <option value="Compact">Compact</option>
        </select><br>
        <label for="brands">Favorite Brands:</label><br>
        <select multiple id="brands" name="brands[]">
            <option value="Canon">Canon</option>
            <option value="Nikon">Nikon</option>
            <option value="Sony">Sony</option>
        </select><br>
        <input type="submit" name="register" value="Submit">
    </form>
</body>

</html>
