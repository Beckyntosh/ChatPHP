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

// Create table for user profiles if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS user_profiles (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  favourite_food VARCHAR(50),
  dietary_restrictions VARCHAR(255),
  bio TEXT,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle profile customization form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $favourite_food = $_POST['favourite_food'];
  $dietary_restrictions = $_POST['dietary_restrictions'];
  $bio = $_POST['bio'];

  $stmt = $conn->prepare("INSERT INTO user_profiles (username, favourite_food, dietary_restrictions, bio) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $username, $favourite_food, $dietary_restrictions, $bio);

  if ($stmt->execute() === TRUE) {
    echo "Profile updated successfully";
  } else {
    echo "Error: " . $stmt->error;
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>User Profile Customization</title>
  <style>
    body { font-family: Arial, sans-serif; }
    form { max-width: 400px; margin: 20px auto; }
    form div { margin-bottom: 10px; }
    label { display: block; }
  </style>
</head>
<body>

<h2>Customize Your Profile</h2>

<form method="post" action="">
  <div>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
  </div>
  <div>
    <label for="favourite_food">Favourite Food:</label>
    <input type="text" id="favourite_food" name="favourite_food">
  </div>
  <div>
    <label for="dietary_restrictions">Dietary Restrictions:</label>
    <input type="text" id="dietary_restrictions" name="dietary_restrictions">
  </div>
  <div>
    <label for="bio">Bio:</label>
    <textarea id="bio" name="bio"></textarea>
  </div>
  <button type="submit">Submit Profile</button>
</form>

</body>
</html>

<?php $conn->close(); ?>