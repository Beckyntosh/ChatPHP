<?php
// Set error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection parameters
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

// Create wishlist table if it doesn't exist
$createWishlistTable = "CREATE TABLE IF NOT EXISTS wishlist (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userId INT(6) UNSIGNED,
    medicineName VARCHAR(255) NOT NULL,
    addedDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($createWishlistTable) === FALSE) {
  echo "Error creating table: " . $conn->error;
}

// Function to sanitize input data
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $medicineName = test_input($_POST["medicineName"]);
  $userId = test_input($_POST["userId"]); // Assume a user ID is provided or obtained through session

  $stmt = $conn->prepare("INSERT INTO wishlist (userId, medicineName) VALUES (?, ?)");
  $stmt->bind_param("is", $userId, $medicineName);

  if ($stmt->execute()) {
    echo "<p>Medicine added to your wishlist successfully!</p>";
  } else {
    echo "<p>Error: " . $stmt->error . "</p>";
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Wishlist Creation and Management</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        form { margin-top: 20px; }
        input[type=text], input[type=number] { width: 100%; padding: 12px 20px; margin: 8px 0; box-sizing: border-box; }
        input[type=submit] { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="container">
    <h2>Wishlist Management</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="userId">User ID:</label><br>
        <input type="number" id="userId" name="userId" required><br>
        <label for="medicineName">Medicine Name:</label><br>
        <input type="text" id="medicineName" name="medicineName" required><br>
        <input type="submit" value="Add to Wishlist">
    </form>
</div>

</body>
</html>
