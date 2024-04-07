<?php

// PHP script to handle backend logic for User Role Management (Admin assigning 'Moderator' role)

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
$sqlUserTable = "CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  role VARCHAR(20) NOT NULL DEFAULT 'User',
  reg_date TIMESTAMP
)";

$sqlRoleTable = "CREATE TABLE IF NOT EXISTS roles (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  role_name VARCHAR(30) NOT NULL
)";

// Check if table creation is successful
if ($conn->query($sqlUserTable) === TRUE && $conn->query($sqlRoleTable) === TRUE) {
  // Check if default roles exist or insert them
  $result = $conn->query("SELECT role_name FROM roles WHERE role_name = 'Moderator' OR role_name = 'User'");
  if ($result->num_rows < 2) {
    // Insert default roles
    $conn->query("INSERT INTO roles (role_name) VALUES ('User'), ('Moderator')");
  }
} else {
  echo "Error creating table: " . $conn->error;
}

// Function to assign role
function assignRole($userId, $role, $conn) {
  $sql = "UPDATE users SET role=? WHERE id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("si", $role, $userId);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
    echo "Role updated successfully.";
  } else {
    echo "Error updating record: " . $conn->error;
  }
  $stmt->close();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $userId = $_POST["userId"];
  $role = $_POST["role"];
  assignRole($userId, $role, $conn);
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Role Management</title>
</head>
<body>
<h2>Assign Role to User</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="userId">User ID:</label><br>
  <input type="number" id="userId" name="userId" required><br>
  <label for="role">Role:</label><br>
  <select name="role" id="role" required>
    <option value="User">User</option>
    <option value="Moderator">Moderator</option>
  </select><br><br>
  <input type="submit" value="Assign Role">
</form>
</body>
</html>