<?php
// Connect to Database
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

// Create users table if it doesn't exist
$usersTableQuery = "CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(50),
  role VARCHAR(10),
  reg_date TIMESTAMP
)";

if ($conn->query($usersTableQuery) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Create roles table if it doesn't exist
$rolesTableQuery = "CREATE TABLE IF NOT EXISTS roles (
  role VARCHAR(10) PRIMARY KEY
)";

if ($conn->query($rolesTableQuery) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Insert predefined roles
$insertRolesQuery = "INSERT INTO roles (role) VALUES ('User'), ('Admin'), ('Moderator')";

if ($conn->query($insertRolesQuery) !== TRUE) {
  echo "Error inserting roles: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Assign the 'Moderator' role to a user
  $email = $_POST["email"];
  $updateRoleQuery = "UPDATE users SET role = 'Moderator' WHERE email = ?";

  $stmt = $conn->prepare($updateRoleQuery);
  $stmt->bind_param("s", $email);

  if ($stmt->execute() === TRUE) {
    echo "Role updated successfully.";
  } else {
    echo "Error updating role: " . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin User Role Management</title>
</head>
<body>
<h2>Assign Moderator Role</h2>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="email">User Email:</label>
  <input type="email" id="email" name="email" required>
  <input type="submit" value="Assign">
</form>
</body>
</html>
