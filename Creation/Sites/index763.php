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