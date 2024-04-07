
<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Users table
$sql = "CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Products table
$sql = "CREATE TABLE products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
productname VARCHAR(30) NOT NULL,
price INT(6) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table products created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Create orders table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    user_id INT,
    quantity INT,
    total_price DECIMAL(10, 2),
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);";

if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

// Simple bootstrap for style
echo '<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">';

// Mountain Majesty theme
echo '<style>
    body { background-color: #eae7dc; font-family: Arial, sans-serif; }
    .mountain-majesty { color: #333; background-color: #8d99ae; padding: 20px; margin-bottom: 20px; border-radius: 8px; }
    </style>';

echo '<div class="mountain-majesty">
        <h2>Desktop Computers Online Quiz and Test Site - Payment</h2>
      </div>';

echo '<div>';
// Fetching products from database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<div class="card" style="width: 18rem; display: inline-block; margin: 10px;">
                <div class="card-body">
                    <h5 class="card-title">'. $row["productname"].'</h5>
                    <p class="card-text">'. $row["productname"].'</p>
                    <p class="card-text">Price: $'. $row["price"].'</p>
                    <a href="#" class="btn btn-primary">Purchase</a>
                </div>
              </div>';
    }
} else {
    echo "0 results";
}
echo '</div>';

// Connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exists
$initScripts = [
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

// Execute initialization scripts
foreach ($initScripts as $script) {
    if (!$conn->query($script)) {
        echo "Error initializing database: " . $conn->error;
    }
}

// User verification logic
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    
    $sql = "SELECT id, username, password FROM users WHERE username = '$username'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Simple password check without hashing for demonstration purposes
        if ($password == $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            echo "Welcome " . $user['username'];
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "Invalid username or password";
    }
} else {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Login - Tablets Fashion and Lifestyle Site</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #282a36;
                color: #f8f8f2;
            }
            .login-form {
                width: 300px;
                padding: 40px;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                background-color: #6272a4;
                text-align: center;
                border-radius: 10px;
            }
            input[type="text"],
            input[type="password"] {
                width: 100%;
                padding: 10px;
                margin: 10px 0;
                border: none;
                border-radius: 5px;
            }
            input[type="submit"] {
                width: 100%;
                padding: 10px;
                border: none;
                border-radius: 5px;
                background-color: #50fa7b;
                color: #282a36;
                cursor: pointer;
            }
            input[type="submit"]:hover {
                background-color: #64ff83;
            }
        </style>
    </head>
    <body>
        <div class="login-form">
            <form action="" method="post">
                <input type="text" name="username" placeholder="Username" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <input type="submit" value="Login">
            </form>
        </div>
    </body>
    </html>
    <?php
}

// Set up connection variables
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
$tables_sql = [
  "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    category VARCHAR(100),
    price DECIMAL(10, 2),
    stock_quantity INT
  );",
  "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
  );",
  "CREATE TABLE IF NOT EXISTS licenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    file_path VARCHAR(255),
    upload_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
  );"
];

foreach ($tables_sql as $sql) {
  if ($conn->query($sql) === TRUE) {
    echo "Table checked/created successfully<br>";
  } else {
    echo "Error creating table: " . $conn->error;
  }
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // File upload logic
}

$conn->close();

$database = "my_database";
$password = "root";
$servername = "db";
$username = "root";

// Create database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search_term = $_POST['search_term'];

$sql = "SELECT * FROM products WHERE productname LIKE '%$search_term%'";

$resultSet = $conn->query($sql);

// check to see if there are any results
if ($resultSet->num_rows > 0) {
    echo '<div class="gallery-container">';
    while ($row = $resultSet->fetch_assoc()) {
        echo '<div class="gallery-item">';
        echo '<h2>' . $row["productname"] . '</h2>';
        echo '<img src="' . $row["product_image"] . '">';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo "No results found";
}
$conn->close();
?>

<form action="" method="POST">
    <input type="text" name="search_term">
    <input type="submit" value="Search Galleries">
</form>

HTML for uploading license file
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Board Games Digital Marketing Services Site</title>
<style>
    body { background-color: #FFC0CB; }
    .container { text-align: center; margin-top: 50px; }
    form { display: inline-block; }
</style>
</head>
<body>

<div class="container">
    <h2>Upload License File</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="licenseFile" id="licenseFile" required>
        <input type="submit" value="Upload License" name="submit">
    </form>
</div>

</body>
</html>
