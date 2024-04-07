<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['add_to_cart'])) {
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    
    $sql = "INSERT INTO cart (user_id, product_id) VALUES ('$user_id', '$product_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Product added to cart successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// Database configuration
$host = "db";
$dbname = "my_database";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = file_get_contents('init.sql');
    $conn->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS coupons (
        id INT AUTO_INCREMENT PRIMARY KEY,
        code VARCHAR(255) NOT NULL,
        discount DECIMAL(5, 2) NOT NULL,
        validity DATE NOT NULL
    )";
    $conn->exec($sql);

} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $couponCode = 'NEW' . strtoupper(substr(md5(time()), 0, 6));
    $discount = 20.00;
    $validity = date('Y-m-d', strtotime('+30 days'));

    try {
        $sql = "INSERT INTO coupons (code, discount, validity) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$couponCode, $discount, $validity]);

        $message = "Thank you for signing up! Your coupon code is: $couponCode";
    } catch (PDOException $e) {
        $message = "Error: " . $e->getMessage();
    }
}

// Create users and products tables
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
 die('Connection failed: ' . $conn->connect_error);
}

$sql = "CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
role VARCHAR(20),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
 echo "Table Users created successfully";
} else {
 echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_name VARCHAR(30) NOT NULL,
product_description VARCHAR(255),
product_price FLOAT(6,2),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
 echo "Table Products created successfully";
} else {
 echo "Error creating table: " . $conn->error;
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFA07A;
            color: #5D4038;
        }
        .btn {
            background-color: #3E2723;
            color: #FFCCBC;
            padding: 10px 20px;
            margin: 10px 0;
            border: none;
            cursor: pointer;
            width: 30%;
            opacity: 0.9;
        }
    </style>
</head>
<body>
<form method="post" action="">
    User ID: <input type="text" name="user_id"><br>
    Product ID: <input type="text" name="product_id"><br>
    <input type="submit" name="add_to_cart" value="Add to Cart" class="btn">
</form>
<div class="container">
    <h1>Welcome to Our Maternity Wear Shop</h1>
    <p>Sign up for a coupon on your first purchase!</p>
    <form action="" method="post" class="coupon-signup-form">
        <input type="email" name="email" placeholder="Enter your email" required>
        <input type="submit" value="Get Coupon">
    </form>
    
    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
</div>
</body>
</html>
<?php
// Database configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create podcast table if not exist
$podcastTableSQL = "CREATE TABLE IF NOT EXISTS podcasts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    episode_count INT,
    category VARCHAR(100),
    publish_date DATE
);";
$conn->query($podcastTableSQL);

// Insert dummy podcasts data
$initPodcastsDataSQL = "INSERT INTO podcasts (title, description, episode_count, category, publish_date) VALUES
('Art Deco Design', 'Podcast discussing the influence of Art Deco in modern furniture design.', 10, 'Design', '2021-06-15'),
('Fashion Forward', 'Exploring the intersection of fashion and furniture through Art Deco styles.', 8, 'Fashion', '2021-07-20'),
('Lifestyle & Spaces', 'Creating lifestyle spaces using Art Deco inspired furniture.', 5, 'Lifestyle', '2021-08-25')
ON DUPLICATE KEY UPDATE title=VALUES(title)";
$conn->query($initPodcastsDataSQL);

// Search podcast functionality
$search = $_GET['search'] ?? ''; 

$searchSQL = "SELECT * FROM podcasts WHERE title LIKE ? OR description LIKE ?";
$stmt = $conn->prepare($searchSQL);
$likeSearch = "%$search%";
$stmt->bind_param("ss", $likeSearch, $likeSearch);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Art Deco Delight - Search Podcasts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #333;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #0779e4 3px solid;
        }
        header a {
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }
        .content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .podcast {
            background: #fff;
            border: 1px solid #ddd;
            margin: 10px;
            padding: 20px;
            width: calc(33% - 40px);
        }
        .podcast h3 {
            color: #0779e4;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Search for Podcasts - <span>Art Deco Delight</span></h1>
        </div>
    </header>
    <div class="container">
        <div class="content">
            <?php if ($result->num_rows > 0): ?>
                <?php while($podcast = $result->fetch_assoc()): ?>
                    <div class="podcast">
                        <h3><?= $podcast['title'] ?></h3>
                        <p><?= substr($podcast['description'], 0, 100) ?>...</p>
                        <ul>
                            <li>Episodes: <?= $podcast['episode_count'] ?></li>
                            <li>Category: <?= $podcast['category'] ?></li>
                            <li>Publish Date: <?= $podcast['publish_date'] ?></li>
                        </ul>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No podcasts found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
<?php
$conn->close();
?>
<!DOCTYPE html>
<html>
<style>
body {
    background-color: #f0f8ff;
}
</style>
<head>
    <title>Winter Makeup Webshop</title>
</head>
<body>
    <form action="webshop.php" method="post" enctype="multipart/form-data">
        Select file to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload File" name="submit">
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

if(isset($_POST["submit"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";

    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $sql = "INSERT INTO users (profile_pic) VALUES ('{$target_file}')";

    if ($conn->query($sql) === TRUE) {
        echo "File successfully uploaded to database";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>