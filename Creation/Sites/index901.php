<!DOCTYPE html>
<html>
    <head>
        <title>Tropical Paradise Perfume Poll</title>
        <style>
            body {
                background-color: #f5f5dc;
                font-family: Arial, sans-serif;
            }
            form {
                margin-top: 20px;
            }
            h1 {
                color: #008080;
}}}
            p {
                color: #006400;
}            </style>
    </head>
    <body>
        <h1>Welcome to the Tropical Paradise Perfume Poll!</h1>
        <p>Please choose your favourite fragrance:</p>
        <form method="post" action="poll.php">
            <?php foreach ($options as $option):?>
            <p>
                <input type="radio" name="product_id" value="<?php echo $option['id']; ?>"> <?php echo $option['name']; ?>
            </p>
            <?php endforeach?>
            <input type="hidden" name="user_id" value="1">
            <input type="submit" name="submit" value="Submit">
        </form>
    </body>
</html>
<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM users WHERE username='".$username."' AND password='".md5($password)."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "Login Successful";
    } else {
        echo "Invalid Credentials";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {background-color: pink;}
</style>
</head>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username"><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password"><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>

<?php

// Database connection settings
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to MySQL Database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Attempt to create tables if they do not exist
$sqlProductsTable = "CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  description TEXT,
  category VARCHAR(100),
  price DECIMAL(10, 2),
  stock_quantity INT
);";

$sqlUsersTable = "CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30),
  name VARCHAR(30),
  email VARCHAR(50),
  password VARCHAR(255)
);";

$conn->query($sqlProductsTable);
$conn->query($sqlUsersTable);

// HTML Header and Styles
echo "<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Handbags Event Planning and Management Site</title>
  <style>
    body { font-family: Arial, sans-serif; background-color: #f4f4f4; }
    .container { max-width: 600px; margin: auto; background: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
    h2 { text-align: center; color: #333; }
    .login { margin-top: 20px; }
    input[type=text], input[type=password] { width: 100%; padding: 15px; margin: 5px 0 22px 0; border: none; background: #f1f1f1; }
    .btn { background-color: #555; color: white; padding: 16px 20px; border: none; cursor: pointer; width: 100%; opacity: 0.9; }
    .btn:hover { opacity: 1; }
  </style>
</head>
<body>
<div class='container'>
  <h2>Login to Your Account</h2>
  <form action='' method='post'>
    <div class='login'>
      <label for='username'><b>Username</b></label>
      <input type='text' placeholder='Enter Username' name='username' required>
      <label for='password'><b>Password</b></label>
      <input type='password' placeholder='Enter Password' name='password' required>
      <button type='submit' class='btn'>Login</button>
    </div>
  </form>
</div>
</body>
</html>";

// Check for POST request to login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $conn->real_escape_string($_POST['username']);
  $password = $_POST['password']; // In a real application, password should be hashed

  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // In a real application, set session variables, or token, and redirect to another page
    echo "<script>alert('Login successful');</script>";
  } else {
    echo "<script>alert('Login failed');</script>";
  }
}

$conn->close();
?>



<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = $_POST['search'];

//SQL for getting news related to sunglasses
$sql = "SELECT * FROM news WHERE title LIKE '%$search%' OR content LIKE '%$search%'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Sunglasses Matrimonial Site - Search News</title>
    <style>
        body{
            background-color: #000033;
            color: #fff;
            text-align: center;
            font-family: Arial, sans-serif;
        }

        h1{
            color: #cc9900;
        }

        .news-card{
            border: 2px solid #cc9900;
            padding: 20px;
            margin: 20px 0;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Sunglasses Matrimonial Site - Search News</h1>
    <form method="POST" action="">
        <input type="text" name="search" required/>
        <input type="submit" value="Search"/>
    </form>

    <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="news-card">';
                echo '<h2>' . $row["title"] . '</h2>';
                echo '<p>' . $row["content"] . '</p>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    ?> 
</body>
</html>

<?php
// Configurations
$MYSQL_ROOT_PASSWORD = "root";
$MYSQL_DATABASE = "my_database";
$servername = "db";
$username = "root";
$password = $MYSQL_ROOT_PASSWORD;
$dbname = $MYSQL_DATABASE;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$tables_sql = [
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
    ('user3', 'User Three', 'user3@example.com', 'password3');",
    "CREATE TABLE IF NOT EXISTS subtitle_files (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT,
        filename VARCHAR(255),
        uploaded_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );"
];

foreach ($tables_sql as $sql) {
    if (!$conn->query($sql)) {
        echo "Error creating table: " . $conn->error;
    }
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["subtitle_file"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["subtitle_file"]["name"]);
    if (move_uploaded_file($_FILES["subtitle_file"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO subtitle_files (user_id, filename) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $userId = 1; // Simulate user ID
        $stmt->bind_param("is", $userId, $target_file);
        $stmt->execute();
        echo "The file ". htmlspecialchars( basename( $_FILES["subtitle_file"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Baby Products Pet Adoption and Care Site</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 5px #aaa;
            border-radius: 8px;
        }
        .form-upload {
            background-color: #eee;
            padding: 15px;
            border-radius: 8px;
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Subtitle File</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="form-upload">
            <input type="file" name="subtitle_file" id="subtitle_file">
            <input type="submit" value="Upload" class="btn">
        </form>
    </div>
</body>
</html>
<?php
$conn->close();
?>