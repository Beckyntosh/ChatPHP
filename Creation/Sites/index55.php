<?php
// Simple web application for role-based user search for a Kitchenware website
// Note: This is a simplified example for educational purposes.

// Database connection settings
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

// Ensure necessary tables exist
$createUsersTable = "CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  role ENUM('admin', 'customer', 'staff') NOT NULL,
  permission_level INT NOT NULL
)";

$createProductsTable = "CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description TEXT,
  available_to ENUM('admin', 'customer', 'staff') NOT NULL
)";

$conn->query($createUsersTable);
$conn->query($createProductsTable);

// Handle user search
$searchResults = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $searchKeyword = $conn->real_escape_string($_POST['search']);
  $userRole = $conn->real_escape_string($_POST['role']);

  // Basic search query
  $searchSql = "SELECT * FROM products WHERE (name LIKE '%$searchKeyword%' OR description LIKE '%$searchKeyword%') AND available_to='$userRole'";
  $result = $conn->query($searchSql);

  if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
      $searchResults .= "id: " . $row["id"]. " - Name: " . $row["name"]. " - Description: " . $row["description"]. "<br>";
    }
  } else {
    $searchResults = "0 results";
  }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitchenware Search</title>
</head>
<body>
    <h1>Welcome to Kitchenware Search</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search" required>
        
        <label for="role">Role:</label>
        <select id="role" name="role">
            <option value="admin">Admin</option>
            <option value="customer">Customer</option>
            <option value="staff">Staff</option>
        </select>

        <input type="submit" value="Search">
    </form>
    <h2>Search Results:</h2>
    <p><?php echo $searchResults; ?></p>
</body>
</html>