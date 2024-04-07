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

// Create tables if they don't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
         id INT AUTO_INCREMENT PRIMARY KEY,
         username VARCHAR(30),
         name VARCHAR(30),
         email VARCHAR(50),
         password VARCHAR(255)
       );
       INSERT INTO users (username, name, email, password) VALUES
       ('user1', 'User One', 'user1@example.com', 'password1'),
       ('user2', 'User Two', 'user2@example.com', 'password2'),
       ('user3', 'User Three', 'user3@example.com', 'password3') 
       ON DUPLICATE KEY UPDATE id=id;

       CREATE TABLE IF NOT EXISTS products (
         id INT AUTO_INCREMENT PRIMARY KEY,
         name VARCHAR(255),
         description TEXT,
         category VARCHAR(100),
         price DECIMAL(10, 2),
         stock_quantity INT
       );
       INSERT INTO products (name, description, category, price, stock_quantity) VALUES
       ('Product A', 'Description of Product A', 'Category1', 19.99, 100),
       ('Product B', 'Description of Product B', 'Category2', 29.99, 80),
       ('Product C', 'Description of Product C', 'Category1', 39.99, 150),
       ('Product D', 'Description of Product D', 'Category3', 49.99, 200),
       ('Product E', 'Description of Product E', 'Category2', 59.99, 60),
       ('Product F', 'Description of Product F', 'Category3', 69.99, 90)
       ON DUPLICATE KEY UPDATE id=id;
";

if (!$conn->multi_query($sql)) {
  echo "Error creating table: " . $conn->error;
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT id, name FROM users WHERE username = '$username' AND password = '$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $_SESSION['username'] = $username;
    header("Location: welcome.php");
    exit;
  } else {
    echo "<script>alert('Invalid username or password');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>School Supplies Event Planning and Management Site</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f9ff; }
        .container { width: 300px; padding: 20px; background-color: white; margin: 0 auto; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .input-group { margin-bottom: 10px; }
        .input-group label { display: block; }
        .input-group input { width: 100%; padding: 8px; border-radius: 5px; border: 1px solid #ccc; }
        .btn { padding: 10px; border: none; background-color: #4CAF50; color: white; cursor: pointer; border-radius: 5px; width: 100%; }
        .btn:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="container">
    <h2>Login to Your Account</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn">Login</button>
    </form>
</div>

</body>
</html>

<?php
$conn->close();
?>