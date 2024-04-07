<?php
// Set up connection parameters
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

// Create connection
$conn = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create the necessary tables if they do not exist
$tables = "CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  password VARCHAR(255) NOT NULL,
  reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS recovery_codes (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(6) UNSIGNED NOT NULL,
  code VARCHAR(255) NOT NULL,
  used TINYINT(1) NOT NULL DEFAULT '0',
  FOREIGN KEY (user_id) REFERENCES users(id)
);";

if ($conn->multi_query($tables)) {
  do {
    if ($result = $conn->store_result()) {
        $result->free();
    }
  } while ($conn->next_result());
}

// Frontend + Backend Logic
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = $_POST['email'];

  // Check if user exists
  $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  
  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $userId = $user['id'];

    // Generate a recovery code and send it to the user's email (simulated here)
    $recoveryCode = rand(100000, 999999);
    mail($email, "Recovery Code", "Your recovery code is: " . $recoveryCode);

    // Store the recovery code in the database
    $stmt = $conn->prepare("INSERT INTO recovery_codes (user_id, code) VALUES (?, ?)");
    $stmt->bind_param("is", $userId, $recoveryCode);
    $stmt->execute();

    echo "<p>A recovery code has been sent to your email. Please enter it below to reset your password.</p>";
    echo '<form action="" method="post">
            <input type="hidden" name="userId" value="' . $userId . '">
            <label for="recoveryCode">Recovery Code:</label>
            <input type="text" id="recoveryCode" name="recoveryCode">
            <input type="submit" value="Verify Code">
          </form>';
  } else {
    echo '<p>User not found.</p>';
  }
} elseif (isset($_POST['recoveryCode']) && isset($_POST['userId'])) {
  $recoveryCode = $_POST['recoveryCode'];
  $userId = $_POST['userId'];

  // Verify the recovery code
  $stmt = $conn->prepare("SELECT id FROM recovery_codes WHERE user_id = ? AND code = ? AND used = 0");
  $stmt->bind_param("is", $userId, $recoveryCode);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
      // Mark code as used
      $row = $result->fetch_assoc();
      $stmt = $conn->prepare("UPDATE recovery_codes SET used = 1 WHERE id = ?");
      $stmt->bind_param("i", $row['id']);
      $stmt->execute();

      echo '<form action="resetPassword.php" method="post">
              <input type="hidden" name="userId" value="' . $userId . '">
              <label for="newPassword">New Password:</label>
              <input type="password" id="newPassword" name="newPassword" required>
              <input type="submit" value="Reset Password">
            </form>';
  } else {
      echo '<p>Invalid recovery code.</p>';
  }
} else {
  // Initial form to start account recovery
  echo '<form action="" method="post">
          <label for="email">Email:</label>
          <input type="text" id="email" name="email" required>
          <input type="submit" value="Send Recovery Code">
        </form>';
}

$conn->close();
?>