<?php
// Database connection
define("MYSQL_ROOT_PSWD", 'root');
define("MYSQL_DB", 'my_database');
$servername = "db";
$username = "root";
$password = MYSQL_ROOT_PSWD;
$dbname = MYSQL_DB;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create user_roles table if it does not exist
$createTableQuery = "CREATE TABLE IF NOT EXISTS user_roles (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  role ENUM('User', 'Moderator', 'Administrator') DEFAULT 'User',
  reg_date TIMESTAMP
)";

if ($conn->query($createTableQuery) === TRUE) {
  echo "Table user_roles created or exists already.";
} else {
  echo "Error creating table: " . $conn->error;
}

// Backend logic for setting a user as a Moderator
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
  $username = $_POST['username'];

  $sql = "UPDATE user_roles SET role='Moderator' WHERE username=?";
  $stmt= $conn->prepare($sql);
  $stmt->bind_param("s", $username);

  if ($stmt->execute() === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Role Management</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      color: #333;
      text-align: center;
    }
    .container {
      max-width: 600px;
      margin: auto;
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    input[type=text], select, button {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    button {
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }
    button:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>

<div class="container">
  <h2>Assign Moderator Role</h2>
  <form method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" placeholder="Enter Username" required>

    <button type="submit">Assign as Moderator</button>
  </form>
</div>

</body>
</html>