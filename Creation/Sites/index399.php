<?php
// Connection parameters
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

// Create tables
$sqlUsers = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$sqlPreferences = "CREATE TABLE IF NOT EXISTS preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
category VARCHAR(50) NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($sqlUsers) === TRUE && $conn->query($sqlPreferences) === TRUE) {
  // Tables created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Registration form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $email = $_POST["email"];
  $preferences = $_POST["preferences"];

  // Insert user
  $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $username, $password, $email);
  $stmt->execute();
  $user_id = $conn->insert_id;

  // Insert preferences
  foreach ($preferences as $preference) {
    $stmt = $conn->prepare("INSERT INTO preferences (user_id, category) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $preference);
    $stmt->execute();
  }

  echo "Registration successful!";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Skateboards News Feed Customization</title>
</head>
<body style="background-color: #f0db4f; font-family: Arial, sans-serif;">
    <h2 style="color: #333;">Customize Your Skateboards News Feed</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <p>Select your news preferences:</p>
        <input type="checkbox" id="tricks" name="preferences[]" value="Tricks">
        <label for="tricks">Tricks & Tips</label><br>
        <input type="checkbox" id="events" name="preferences[]" value="Events">
        <label for="events">Skateboarding Events</label><br>
        <input type="checkbox" id="gear" name="preferences[]" value="Gear">
        <label for="gear">Latest Gear</label><br>
        <input type="submit" value="Register" style="background-color: #333; color: #fff; padding: 10px; cursor: pointer;">
    </form>
</body>
</html>