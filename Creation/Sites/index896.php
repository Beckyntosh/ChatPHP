<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$checkTablesSQL = [
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
        username VARCHAR(30) NOT NULL,
        name VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        password VARCHAR(255) NOT NULL
    );",
    "CREATE TABLE IF NOT EXISTS ratings (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT,
        product_id INT,
        rating INT,
        FOREIGN KEY (user_id) REFERENCES users(id),
        FOREIGN KEY (product_id) REFERENCES products(id)
    );",
    "CREATE TABLE IF NOT EXISTS tracking_numbers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT,
        tracking_number VARCHAR(50),
        FOREIGN KEY (user_id) REFERENCES users(id)
    );",
    "CREATE TABLE IF NOT EXISTS video_uploads (
        id INT AUTO_INCREMENT PRIMARY KEY,
        video_title VARCHAR(100),
        video_description TEXT,
        upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );"
];

foreach ($checkTablesSQL as $sql) {
    if (!$conn->query($sql)) {
        echo "Error creating table: " . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['userId']) && isset($_POST['productId']) && isset($_POST['rating'])) {
        $userId = $_POST['userId'];
        $productId = $_POST['productId'];
        $rating = $_POST['rating'];

        $sql = "INSERT INTO ratings (user_id, product_id, rating) VALUES ('$userId', '$productId', '$rating')";

        $conn->query($sql);
    } elseif (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $sql = "SELECT * FROM users WHERE username='" . $username . "' AND password='" . md5($password) . "'";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            echo "Login Successful";
        } else {
            echo "Invalid Credentials";
        }
    } elseif (isset($_FILES['videoFile'])) {
        // Assuming this is a continuation of video upload handling part
        // Further process for uploading and saving video information in database goes here
    }
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Combined Website</title>
    <style>
        body {background-color: pink; font-family: Arial, sans-serif;}
        .product {border: 1px solid #000; margin: 10px; padding: 10px;}
        .form-container {background-color: white; width: 300px; margin: 100px auto; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 8px;}
        h2 {text-align: center; color: #333;}
        .input-group {margin-bottom: 20px;}
        .input-group input {width: calc(100% - 20px); padding: 10px; margin-top: 5px; border-radius: 5px; border: 1px solid #ddd;}
        .submit-btn {width: 100%; padding: 10px; background-color: #556b2f; color: white; border: none; border-radius: 5px; cursor: pointer;}
        .submit-btn:hover {background-color: #6b8e23;}
        .container {padding: 20px; background-color: #2a9d8f; max-width: 600px; margin: auto; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);}
        input[type=text], input[type=file] {width: 100%; padding: 12px; margin: 5px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;}
        input[type=submit] {width: 100%; background-color: #e76f51; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;}
        input[type=submit]:hover {background-color: #e9c46a;}
    </style>
</head>
<body>

<div class="form-container">
    <h2>Login</h2>
    <form action="" method="post">
        <div class="input-group">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br>
        </div>
        <div class="input-group">
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
        </div>
        <input type="submit" value="Submit" class="submit-btn">
    </form>
</div>

<?php while ($row = $result->fetch_assoc()): ?>
    <div class="product">
        <h2><?php echo $row['name']; ?></h2>
        <form method="POST">
            <input type="hidden" name="userId" value="1">
            <input type="hidden" name="productId" value="<?php echo $row['id']; ?>">
            <label for="rating">Rating:</label>
            <input type="number" id="rating" name="rating" min="1" max="5">
            <input type="submit" value="Submit">
        </form>
    </div>
<?php endwhile; ?>

<div class="container">
    <h2>Upload Your Desert Dazzle Videos</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Video Title" required>
        <textarea name="description" placeholder="Video Description" required></textarea>
        <input type="file" name="videoFile" required>
        <input type="submit" value="Upload Video">
    </form>
</div>

</body>
</html>