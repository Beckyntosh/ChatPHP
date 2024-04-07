<?php
// Database configuration
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

// Create tables if they do not exist
$initSql = [];
$initSql[] = "CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  description TEXT,
  category VARCHAR(100),
  price DECIMAL(10,2),
  stock_quantity INT
)";

$initSql[] = "INSERT INTO products (name, description, category, price, stock_quantity) VALUES 
('Product A', 'Description of Product A', 'Category1', 19.99, 100),
('Product B', 'Description of Product B', 'Category2', 29.99, 80),
('Product C', 'Description of Product C', 'Category1', 39.99, 150),
('Product D', 'Description of Product D', 'Category3', 49.99, 200),
('Product E', 'Description of Product E', 'Category2', 59.99, 60),
('Product F', 'Description of Product F', 'Category3', 69.99, 90)";

$initSql[] = "CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30),
  name VARCHAR(30),
  email VARCHAR(50),
  password VARCHAR(255)
)";

$initSql[] = "INSERT INTO users (username, name, email, password) VALUES
('user1', 'User One', 'user1@example.com', 'password1'),
('user2', 'User Two', 'user2@example.com', 'password2'),
('user3', 'User Three', 'user3@example.com', 'password3')";

$initSql[] = "CREATE TABLE IF NOT EXISTS dvd_uploads (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  dvd_name VARCHAR(255),
  file_path VARCHAR(255),
  upload_date DATETIME DEFAULT CURRENT_TIMESTAMP
)";

// Execute SQL
foreach ($initSql as $sql) {
    if ($conn->query($sql) !== TRUE) {
        echo "Error creating table or inserting data: " . $conn->error;
    }
}

// File upload handler
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["dvdFile"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["dvdFile"]["name"]);
    if (move_uploaded_file($_FILES["dvdFile"]["tmp_name"], $target_file)) {
        // Insert upload record into database
        $sql = "INSERT INTO dvd_uploads (user_id, dvd_name, file_path) VALUES (1, '" . basename($_FILES["dvdFile"]["name"]) . "', '$target_file')";
        if ($conn->query($sql) === TRUE) {
            echo "File ". htmlspecialchars(basename($_FILES["dvdFile"]["name"])). " has been uploaded.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DVDs Local Business Directory - File Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2c3e50;
            color: #ecf0f1;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #34495e;
            border-radius: 4px;
        }
        input[type="file"], input[type="submit"] {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload DVD Details</h2>
        <form action="" method="post" enctype="multipart/form-data">
            Select DVD image to upload:
            <input type="file" name="dvdFile" id="dvdFile">
            <input type="submit" value="Upload DVD" name="submit">
        </form>
    </div>
</body>
</html>
<?php
// Close connection
$conn->close();
?>