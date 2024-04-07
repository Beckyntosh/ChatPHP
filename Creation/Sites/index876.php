<?php
/* Database Connection */
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

// Create table for podcasts if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS podcasts (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255),
description TEXT,
file_path VARCHAR(255)
)";
if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["podcastFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["podcastFile"]["tmp_name"], $target_file)) {
            // Insert into database
            $sql = "INSERT INTO podcasts (title, description, file_path) VALUES ('$title', '$description', '$target_file')";
            if ($conn->query($sql) !== TRUE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            echo "The file ". htmlspecialchars( basename( $_FILES["podcastFile"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Create orders table if not exists
$ordersTableSQL = "CREATE TABLE IF NOT EXISTS orders (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
product_id INT,
order_status VARCHAR(50),
FOREIGN KEY (user_id) REFERENCES users(id),
FOREIGN KEY (product_id) REFERENCES products(id)
)";
if (!$conn->query($ordersTableSQL) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Create products, users and insert data
$tables_sql = [
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
    )"
];

foreach ($tables_sql as $sql) {
  if ($conn->query($sql) !== TRUE) {
    echo "Error creating table or inserting data: " . $conn->error;
  }
}

// Sign up form submission and handling

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header("Location: welcome.php");
        exit;
    } else {
        $message = "Invalid email or password";
    }
}

// Create attachments table if not exists
$createAttachmentsTableQuery = "
CREATE TABLE IF NOT EXISTS attachments (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
filename VARCHAR(255),
upload_date DATETIME DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createAttachmentsTableQuery)) {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["attachment"])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["attachment"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    
    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf', 'doc', 'docx');
    if(in_array($fileType, $allowTypes)){
        
        if(move_uploaded_file($_FILES["attachment"]["tmp_name"], $targetFilePath)){
            $insert = $conn->query("INSERT INTO attachments (user_id, filename) VALUES (1, '".$fileName."')");
            
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            } else {
                $statusMsg = "File upload failed, please try again.";
            } 
        } else {
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    } else {
        $statusMsg = "Sorry, only JPG, JPEG, PNG, GIF, PDF, DOC & DOCX files are allowed to upload.";
    }
} 

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Podcast</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #ff0000; color: #ffffff; }
        form { margin: 0 auto; width: 300px; padding: 20px; background-color: #f2f2f2; color: #000000; border-radius: 8px; }
        input, textarea { width: 100%; margin: 5px 0; padding: 8px; }
        .submit-btn { background-color: #4CAF50; color: #ffffff; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Upload a Podcast</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>
        <label for="podcastFile">Select file:</label>
        <input type="file" id="podcastFile" name="podcastFile" required>
        <input type="submit" value="Upload Podcast" name="submit" class="submit-btn">
    </form>
    
    <h2>Track Your Order</h2>
        <form action="index.php" method="post">
            <label for="orderId">Order ID:</label>
            <input type="text" id="orderId" name="orderId" required>
            <button type="submit" name="trackOrder">Track Order</button>
        </form>
        <?php
        if (isset($_POST['trackOrder'])) {
            $orderId = $conn->real_escape_string($_POST['orderId']);
            $query = "SELECT orders.id, orders.order_status, products.name 
                      FROM orders 
                      JOIN products ON orders.product_id = products.id
                      WHERE orders.id = '$orderId'";

            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<p>Order ID: " . $row["id"] . " - Product Name: " . $row["name"] . " - Status: " . $row["order_status"] . "</p>";
                }
            } else {
                echo "<p>Order not found. Please check the Order ID and try again.</p>";
            }
        }
        ?>

        <div class="container">
        <h2>Sign In to Camera's Political Campaign</h2>
        <p style="color:red;"><?php echo $message; ?></p>
        <form method="post" action="">
            <div>
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>
            </div>
            <div>
                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
            </div>
            <button type="submit">Sign In</button>
        </form>
    </div>
    </div>

    <h2>Upload Resume</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="attachment" id="attachment" required>
        <input type="submit" value="Upload File" name="submit">
    </form>
    <?php if(isset($statusMsg)): ?>
        <div class="status">
            <?php echo $statusMsg; ?>
        </div>
    <?php endif; ?>
</body>
</html>

  <h2>Search for Products</h2>
    <form action="" method="post">
        <input type="text" name="search" placeholder="Search..." value="<?= htmlspecialchars($search, ENT_QUOTES) ?>">
        <input type="submit" value="Search">
    </form>

    <?php if ($search !== '' && empty($results)): ?>
        <p>No results found for "<?= htmlspecialchars($search) ?>"</p>
    <?php elseif ($results): ?>
        <ul>
            <?php foreach ($results as $prod): ?>
                <li><?= htmlspecialchars($prod['name']) ?>: $<?= $prod['price'] ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>

<?php
$host = 'db';
$db   = 'my_database';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);
$search = $_POST['search'] ?? '';
$query = $pdo->prepare('SELECT * FROM products WHERE name LIKE ?');
$query->execute(["%$search%"]);
$results = $query->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Makeup Webshop</title>
    <style>
        body{ font-family: Arial; background-color: pink; }
        form{ width:200px; margin:20px auto; }
        ul{ list-style-type: none; }
    </style>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="search" placeholder="Search..." value="<?= htmlspecialchars($search, ENT_QUOTES) ?>">
        <input type="submit" value="Search">
    </form>

    <?php if ($search !== '' && empty($results)): ?>
        <p>No results found for "<?= htmlspecialchars($search) ?>"</p>
    <?php elseif ($results): ?>
        <ul>
            <?php foreach ($results as $prod): ?>
                <li><?= htmlspecialchars($prod['name']) ?>: $<?= $prod['price'] ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>

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
// Create attachments table if not exists
$createAttachmentsTableQuery = "
CREATE TABLE IF NOT EXISTS attachments (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
filename VARCHAR(255),
upload_date DATETIME DEFAULT CURRENT_TIMESTAMP
);";
if (!$conn->query($createAttachmentsTableQuery)) {
  echo "Error creating table: " . $conn->error;
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["attachment"])) {
  $targetDir = "uploads/";
  $fileName = basename($_FILES["attachment"]["name"]);
  $targetFilePath = $targetDir . $fileName;
  $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
  // Allow certain file formats
  $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf', 'doc', 'docx');
  if(in_array($fileType, $allowTypes)){
      
      if(move_uploaded_file($_FILES["attachment"]["tmp_name"], $targetFilePath)){
          $insert = $conn->query("INSERT INTO attachments (user_id, filename) VALUES (1, '".$fileName."')");
          if($insert){
              $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
          } else {
              $statusMsg = "File upload failed, please try again.";
          } 
      } else {
          $statusMsg = "Sorry, there was an error uploading your file.";
      }
  } else {
      $statusMsg = "Sorry, only JPG, JPEG, PNG, GIF, PDF, DOC & DOCX files are allowed to upload.";
  }
} 
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal - Upload Resume</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* AliceBlue to create a spring theme */
            color: #303030;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="file"] {
            font-size: 16px;
        }
        .btn {
            background-color: #4CAF50; /* Green */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 17px;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .status {
            margin-top: 20px;
            padding: 10px;
            background-color: #dddddd;
            border: 1px solid #cccccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Resume</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="attachment">Choose file</label>
                <input type="file" name="attachment" id="attachment" required>
            </div>
            <input type="submit" class="btn" value="Upload File" name="submit">
        </form>
        <?php if(isset($statusMsg)): ?>
            <div class="status">
                <?php echo $statusMsg; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
