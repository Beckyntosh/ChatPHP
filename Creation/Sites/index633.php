<?php
// Simple PHP script for a Hair Care Products Online Discussion and Debate Platform
// Connect to MySQL database
$servername = "db";
$username = "root"; // Assume root username for simplicity, replace with actual username in production
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exists
$initQueries = [
  "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    category VARCHAR(100),
    price DECIMAL(10, 2),
    stock_quantity INT
  );",
  "INSERT INTO products (name, description, category, price, stock_quantity) VALUES
    ('Product A', 'Description of Product A', 'Category1', 19.99, 100),
    ('Product B', 'Description of Product B', 'Category2', 29.99, 80),
    ('Product C', 'Description of Product C', 'Category1', 39.99, 150),
    ('Product D', 'Description of Product D', 'Category3', 49.99, 200),
    ('Product E', 'Description of Product E', 'Category2', 59.99, 60),
    ('Product F', 'Description of Product F', 'Category3', 69.99, 90);",
  "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
  );",
  "INSERT INTO users (username, name, email, password) VALUES
    ('user1', 'User One', 'user1@example.com', 'password1'),
    ('user2', 'User Two', 'user2@example.com', 'password2'),
    ('user3', 'User Three', 'user3@example.com', 'password3');"
];

foreach ($initQueries as $query) {
  if ($conn->query($query) === FALSE) {
    echo "Error creating table: " . $conn->error;
  }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    echo "<div>Welcome back, $username!</div>";
  } else {
    echo "<div>Invalid username or password.</div>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Hair Care Products Discussion Platform - Login</title>
<style>
  body {
    font-family: 'Arial', sans-serif;
    background-color: #f0e4d7;
    color: #335c67;
    text-align: center;
    padding: 50px;
  }
  input, button {
    margin: 10px;
  }
  .container {
    background-color: #fff3b0;
    display: inline-block;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
  }
</style>
</head>
<body>
  <div class="container">
    <h2>Whimsical Wonderland Hair Care Discussion - Login</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Username: <input type="text" name="username" required><br>
      Password: <input type="password" name="password" required><br>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>

<?php
$conn->close();
?>