<?php
// This scrip acts as both the backend logic and the presentation layer for simplicity, following a single-file approach.
// WARNING: This example is for educational purposes only and lacks many security best practices.

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

$sqlUserTable = "CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
skinType ENUM('dry', 'oily', 'combination', 'sensitive', 'normal') DEFAULT 'normal',
preferences TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sqlUserTable) === TRUE) {
  // echo "Table Users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $skinType = $_POST['skinType'];
  $preferences = json_encode($_POST['preferences']);

  $stmt = $conn->prepare("INSERT INTO Users (firstname, lastname, email, skinType, preferences) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $firstname, $lastname, $email, $skinType, $preferences);

  if ($stmt->execute()) {
    echo "<div>Profile created successfully</div>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile Customization</title>
</head>
<body>
  <h2>Profile Customization</h2>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="firstname">First Name:</label><br>
    <input type="text" id="firstname" name="firstname" required><br>
    <label for="lastname">Last Name:</label><br>
    <input type="text" id="lastname" name="lastname" required><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="skinType">Skin Type:</label><br>
    <select name="skinType" id="skinType">
      <option value="dry">Dry</option>
      <option value="oily">Oily</option>
      <option value="combination">Combination</option>
      <option value="sensitive">Sensitive</option>
      <option value="normal">Normal</option>
    </select><br>
    <fieldset>
      <legend>Product Preferences:</legend>
      <input type="checkbox" id="moisturizer" name="preferences[]" value="moisturizer">
      <label for="moisturizer">Moisturizer</label><br>
      <input type="checkbox" id="cleanser" name="preferences[]" value="cleanser">
      <label for="cleanser">Cleanser</label><br>
      <input type="checkbox" id="sunscreen" name="preferences[]" value="sunscreen">
      <label for="sunscreen">Sunscreen</label><br>
    </fieldset>
    <input type="submit" value="Submit">
  </form>
</body>
</html>
