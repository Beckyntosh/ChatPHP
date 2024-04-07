<?php

// Database Connection
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
$sql = "CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  password VARCHAR(255) NOT NULL,
  two_factor_secret VARCHAR(255),
  backup_codes VARCHAR(255),
  reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Initialize variables
$errorMessage = '';
$successMessage = '';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require_once 'vendor/autoload.php';
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  // Two-Factor Setup
  $google2fa = new \PragmaRX\Google2FAQRCode\Google2FA();
  $secret = $google2fa->generateSecretKey();

  // Generate Backup Codes
  $backupCodes = [];
  for ($i = 0; $i < 5; $i++) {
    array_push($backupCodes, bin2hex(random_bytes(5)));
  }
  $backupCodesSerialized = serialize($backupCodes);

  // Save to Database
  $stmt = $conn->prepare("INSERT INTO users (username, password, two_factor_secret, backup_codes) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $username, $password, $secret, $backupCodesSerialized);
  if($stmt->execute()) {
    $successMessage = 'User registered successfully. Your backup codes are: ' . implode(", ", $backupCodes);
  } else {
    $errorMessage = 'Error: ' . $stmt->error;
  }
}

$conn->close();
?>

<html>
<head>
    <title>Two-Factor Authentication Setup</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
  <div class="container">
    <?php if ($errorMessage != ''): ?>
      <p class="error"><?php echo $errorMessage; ?></p>
    <?php endif; ?>

    <?php if ($successMessage != ''): ?>
      <p class="success"><?php echo $successMessage; ?></p>
    <?php endif; ?>

    <form method="POST">
      <h2>Register for Two-Factor Authentication</h2>
      <label for="username">Username:</label><br>
      <input type="text" id="username" name="username" required><br><br>
      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password" required><br><br>
      <input type="submit" value="Register">
    </form> 
  </div>
</body>
</html>