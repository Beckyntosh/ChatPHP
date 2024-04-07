<?php
// Define database connection parameters
$MYSQL_HOST = 'db';
$MYSQL_USER = 'root';
$MYSQL_PASS = 'root';
$MYSQL_DBNAME = 'my_database';

// Establish a connection to the database
try {
  $pdo = new PDO("mysql:host=$MYSQL_HOST;dbname=$MYSQL_DBNAME", $MYSQL_USER, $MYSQL_PASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Could not connect to the database $MYSQL_DBNAME :" . $e->getMessage());
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"] ?? '';
  $email = $_POST["email"] ?? '';
  $password = $_POST["password"] ?? '';

  // Hash password
  $passwordHash = password_hash($password, PASSWORD_DEFAULT);

  // Insert new user into the database
  $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$username, $email, $passwordHash]);

  // Redirect to login page or wherever you wish
  header("Location: login.php");
  exit();
}

// Simple HTML form for user registration
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup for Exclusive Access - Bath Products</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f5f5f5; margin: 0; padding: 20px; }
        .container { max-width: 400px; margin: 20px auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        form { display: flex; flex-direction: column; }
        label { margin-bottom: 8px; }
        input[type="text"], input[type="email"], input[type="password"] { margin-bottom: 16px; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 10px; background-color: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up for Exclusive Content</h2>
        <form method="post" action="signup.php">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Signup</button>
        </form>
    </div>
</body>
</html>
<?php
// Create users table if not exists
$tableQuery = "CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  password VARCHAR(255),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$pdo->exec($tableQuery);
?>
