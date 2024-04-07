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

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $selectedUser = $_POST['selectedUser'];
  $role = $_POST['role'];

  // Update user role in the database
  $sql = "UPDATE users SET role = '$role' WHERE id = $selectedUser";

  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
}

// Fetch users from database
$userQuery = "SELECT id, username FROM users";
$userResult = $conn->query($userQuery);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - User Role Management</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        label, select { display: block; margin: 15px 0; }
    </style>
</head>
<body>
<div class="container">
    <h2>Assign Role to User</h2>
    <form action="" method="post">
        <label for="selectedUser">Select User:</label>
        <select name="selectedUser" id="selectedUser">
            <?php if ($userResult->num_rows > 0): ?>
                <?php while($row = $userResult->fetch_assoc()): ?>
                    <option value="<?= $row["id"] ?>"><?= $row["username"] ?></option>
                <?php endwhile; ?>
            <?php endif; ?>
        </select>

        <label for="role">Assign Role:</label>
        <select name="role" id="role">
            <option value="User">User</option>
            <option value="Moderator">Moderator</option>
            <option value="Administrator">Administrator</option>
        </select>

        <button type="submit">Assign Role</button>
    </form>
</div>
</body>
</html>
<?php
$conn->close();
?>