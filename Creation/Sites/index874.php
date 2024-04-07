
<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$queries = [
    "CREATE TABLE IF NOT EXISTS enrolment (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT,
        product_id INT
    )",
    "CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        description TEXT,
        category VARCHAR(100),
        price DECIMAL(10, 2),
        stock_quantity INT
    )",
    "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30),
        name VARCHAR(30),
        email VARCHAR(50),
        password VARCHAR(255)
    )",
    "CREATE TABLE IF NOT EXISTS articles (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(30) NOT NULL,
        content TEXT NOT NULL,
        category VARCHAR(30) NOT NULL
    )",
    "INSERT INTO products (name, description, category, price, stock_quantity) VALUES 
        ('Product A', 'Description of Product A', 'Category1', 19.99, 100), 
        ('Product B', 'Description of Product B', 'Category2', 29.99, 80), 
        ('Product C', 'Description of Product C', 'Category1', 39.99, 150),
        ('Product D', 'Description of Product D', 'Category3', 49.99, 200),
        ('Product E', 'Description of Product E', 'Category2', 59.99, 60),
        ('Product F', 'Description of Product F', 'Category3', 69.99, 90)
        ON DUPLICATE KEY UPDATE name = VALUES(name),
                                description = VALUES(description),
                                category = VALUES(category),
                                price = VALUES(price),
                                stock_quantity = VALUES(stock_quantity)"
];

foreach ($queries as $query) {
  if ($conn->query($query) === FALSE) {
    echo "Error: " . $conn->error;
  }
}

function enrollCourse($conn, $user_id, $product_id){
  $sql = "INSERT INTO enrolment (user_id, product_id) VALUES (?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $user_id, $product_id);
  
  if ($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $stmt->error;
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enroll'])) {
    enrollCourse($conn, $_POST['user_id'], $_POST['product_id']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $insert_query = "INSERT INTO users (username, name, email, password) VALUES ('newuser', ?, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("sss", $name, $email, $hashed_password);
    if($stmt->execute()) {
        echo "User registered successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $search_keyword = $conn->real_escape_string($_POST["search"]);
    $sql = "SELECT id, title, category FROM articles WHERE title LIKE ? OR category LIKE ?";
    $stmt = $conn->prepare($sql);
    $search_keyword = "%$search_keyword%";
    $stmt->bind_param("ss", $search_keyword, $search_keyword);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p>id: " . $row["id"]. " - Name: " . $row["title"]. " " . $row["category"]. "</p>";
        }
    } else {
        echo "<p>No results found!</p>";
    }
}

$pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
]);

$query = 'CREATE TABLE IF NOT EXISTS uploads (
          id INT AUTO_INCREMENT PRIMARY KEY,
          name VARCHAR(100),
          mimetype VARCHAR(100),
          data LONGBLOB)';
$pdo->query($query);

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['userfile'])) {
  $name = $_FILES['userfile']['name'];
  $mimetype = $_FILES['userfile']['type'];
  
  if($mimetype == 'application/pdf') {
    $data = file_get_contents($_FILES['userfile']['tmp_name']);
    $stmt = $pdo->prepare("INSERT INTO uploads (name, mimetype, data) VALUES (?, ?, ?)");
    $stmt->execute([$name, $mimetype, $data]);
    echo "File uploaded successfully";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <style>
    body {
        font-family: Arial, sans-serif;
        background-image: url('https://images.unsplash.com/photo-1501594907352-04cda38ebc29');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        color: white;
    }
    
    h1 {
        font-size: 2em;
        text-align: center;
        margin-top: 10px;
    }
    
    .content, .register-form, .search-form, .enrollment-form, .upload-form {
        width: 300px;
        margin: 10px auto;
        background: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 5px;
        text-align: center;
    }
    
    input, label {
        margin-top: 10px;
    }
    
    .enrollment-form {
        display: inline-block;
        margin-left: 60px;
    }
    
    .register-form {
        display: inline-block;
        margin-right: 60px;
    }
  </style>
</head>
<body>
    <h1>Clothing News - Enroll in Course</h1>
    <div class="enrollment-form">
        <form method="post">
            <label>User ID:</label>
            <input type="number" name="user_id">
            <br>
            <label>Product ID:</label>
            <input type="number" name="product_id">
            <br>
            <input type="submit" value="Enroll" name="enroll">
        </form>
    </div>
    
    <div class="register-form">
        <h2>Register User</h2>
        <form method="post">
            <label>Name:</label>
            <input type="text" name="name">
            <br>
            <label>Email:</label>
            <input type="email" name="email">
            <br>
            <label>Password:</label>
            <input type="password" name="password">
            <br>
            <input type="submit" value="Register" name="register">
        </form>
    </div>
    
    <div class="search-form">
        <h2>Beach Themed Desktop Computers Blog</h2>
        <form method="post">
            <input type="text" name="search" placeholder="Search how-to articles">
            <input type="submit" name="submit" value="Search">
        </form>
    </div>
    
    <div class="upload-form">
        <h2>Upload a Book PDF</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="userfile">
            <input type="submit" value="Upload">
        </form>
    </div>
</body>
</html>
