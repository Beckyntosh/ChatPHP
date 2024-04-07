<?php
$server = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $user = $conn->real_escape_string($_POST["user"]);
  $product = $conn->real_escape_string($_POST["product"]);
  $date = $conn->real_escape_string($_POST["date"]);

  $sql = "INSERT INTO meetings (user, product, date) VALUES ('$user', '$product', '$date')";

  if ($conn->query($sql) === TRUE) {
    echo "New meeting scheduled successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

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

// Create social media links table if not exists
$sql = "CREATE TABLE IF NOT EXISTS social_media_links (
    id INT AUTO_INCREMENT PRIMARY KEY,
    platform_name VARCHAR(100),
    link VARCHAR(255)
)";
$conn->query($sql);

// Insert social media links (Example)
$sql_social_media = "INSERT INTO social_media_links (platform_name, link) VALUES 
                     ('Facebook', 'https://facebook.com/YOUR_BUSINESS_PAGE'),
                     ('Twitter', 'https://twitter.com/YOUR_BUSINESS_PAGE'),
                     ('Instagram','https://instagram.com/YOUR_BUSINESS_PAGE')
                     ON DUPLICATE KEY UPDATE link=VALUES(link)";

$conn->query($sql_social_media);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Sporting Goods Corporate Site</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f2;
        color: #333;
        margin: 0;
        padding: 0;
    }

    .header, .footer {
        background-color: #0a4c3e;
        color: #ffffff;
        text-align: center;
        padding: 1em 0;
    }

    .content {
        padding: 20px;
    }

    .social-media-links > a {
        margin: 0 10px;
        color: #0a4c3e;
        text-decoration: none;
        font-size: 20px;
    }
</style>
</head>
<body>
<div class="header">
    <h1>Sporting Goods Business</h1>
</div>
<div class="content">
    <h2>Follow Us on Social Media</h2>
    <div class="social-media-links">
        <?php
        $sql = "SELECT * FROM social_media_links";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<a href='".$row["link"]."'>".$row["platform_name"]."</a>";
            }
        } else {
            echo "No social media links found.";
        }
        ?>
    </div>
</div>
<div class="footer">
    <p>© 2023 Sporting Goods Business</p>
</div>
</body>
</html>

<?php
$conn->close();
?>
<?php 
// Define connection parameters
$servername = "db";
$username = "root";
$password = "root;
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exists
$sqlInit = file_get_contents('init.sql');
if (!$conn->multi_query($sqlInit)) {
  echo "Error creating table: " . $conn->error;
}

// Wait for multi queries to finish
do {
  if ($res = $conn->store_result()) {
    $res->free();
  }
} while ($conn->more_results() && $conn->next_result());

// Handle POST request from login form
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
  $username = $conn->real_escape_string($_POST['username']);
  $password = $conn->real_escape_string($_POST['password']);

  $sql = "SELECT id FROM users WHERE username ='$username' AND password ='$password'";
  $result = $conn->query($sql);

  if($result->num_rows == 1){
    // Successful login
    header("location: welcome.php");
  }else{
      $error = "Your Login Name or Password is invalid";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Skateboards Video Sharing - Login</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #8FBC8F; /* Forest background color */
        color: white;
    }
    .login-container {
        width: 300px;
        padding: 20px;
        background-color: #556B2F; /* Dark Olive Green */
        margin: 100px auto;
        border-radius: 8px;
        box-shadow: 0 0 10px #000;
    }
    input[type=text], input[type=password] {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        border-radius: 4px;
    }
    button {
        background-color: #6B8E23; /* Olive Drab */
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        border-radius: 4px;
    }
    button:hover {
        opacity: 0.8;
    }
    .error {
        color: red;
    }
</style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit" name="login">Login</button>
    </form>
    <?php if(isset($error)) { echo "<div class='error'>".$error."</div>"; } ?>
</div>

</body>
</html>

<?php 
$conn->close();
?>
<?php
// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try {
  $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  die("ERROR: Could not connect. " . $e->getMessage());
}

// Define variables and initialize with empty values
$search = "";
$search_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(empty(trim($_POST["search"]))){
    $search_err = "Please enter a search query.";
  } else{
    $search = trim($_POST["search"]);
  }

  // Check input errors before inserting in database
  if(empty($search_err)){
    // Prepare a select statement
    $sql = "SELECT * FROM products WHERE name LIKE :search OR description LIKE :search";

    if($stmt = $pdo->prepare($sql)){
      // Bind variables to the prepared statement as parameters
      $stmt->bindParam(":search", $param_search, PDO::PARAM_STR);

      // Set parameters
      $param_search = "%$search%";

      // Attempt to execute the prepared statement
      if($stmt->execute()){
        // Check if any products were found
        if($stmt->rowCount() > 0){
          $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else{
          $search_err = "No products found matching your query.";
        }
      } else{
        echo "Oops! Something went wrong. Please try again later.";
      }
    }

  // Close statement
  unset($stmt);
}

// Close connection
unset($pdo);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Search in Kitchenware Archive</title>
<style>
    body { background-color: #0a0b1d; font-family: Arial, sans-serif; color: #d1d4da; }
    .wrapper { width: 350px; padding: 20px; margin: auto; background-color: #16172b; border-radius: 5px; }
    .form-group { margin-bottom: 20px; }
    .form-group label { display: block; margin-bottom: 5px; }
    .form-group input[type="text"] { width: 100%; padding: 10px; border-radius: 5px; border: none; }
    .btn { padding: 10px 20px; background-color: #3c3f5c; border: none; border-radius: 5px; color: white; cursor: pointer; }
    .btn:hover { background-color: #545772; }
    .error { color: #ff3860; }
</style>
</head>
<body>
<div class="wrapper">
<h2>Search for Kitchenware</h2>
<p>Please enter your search query below.</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="form-group <?php echo (!empty($search_err)) ? 'has-error' : ''; ?>">
<label>Search</label>
<input type="text" name="search" class="form-control" value="<?php echo $search; ?>">
<span class="error"><?php echo $search_err; ?></span>
</div>
<div class="form-group">
<input type="submit" class="btn" value="Search">
</div>
</form>
</div>    
    
<?php if(isset($results)): ?>
<div style="padding: 20px; margin: auto; background-color: #16172b; border-radius: 5px; width: 80%;">
<h2>Search Results</h2>
<?php foreach($results as $row): ?>
<p><?php echo htmlspecialchars($row["name"]); ?> - $<?php echo htmlspecialchars($row["price"]); ?> (In Stock: <?php echo htmlspecialchars($row["stock_quantity"]); ?>)</p>
<?php endforeach; ?>
</div>
<?php endif; ?>
</body>
</html>

<?php
$server = "db";
$database = "my_database";
$username = "root";
$password = "root;

//Create connection
$conn = new mysqli($server, $username, $password,$database);

//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO products (product_image) VALUES ('$target_file')";

        if ($conn->query($sql) === TRUE) {
            echo "File uploaded successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }              
    }else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Makeup Webshop</title>
<style>
body{
background-color: pink;
color: white;
font-family: "Lucida Console", "Courier New", monospace;
}
h1{
text-align: center;
}
</style>
</head>
<body>
<h1>Valentine Makeup Webshop</h1>
<form action="upload.php" method="post" enctype="multipart/form-data">
Select image to upload:
<input type="file" name="fileToUpload" id="fileToUpload">
<input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
<?php
$server = "db";
$username = "root";
$password = "root;
$database = "my_database";

// Create connection
$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user = $_POST["user"];
  $product = $_POST["product"];
  $date = $_POST["date"];

  $sql = "INSERT INTO meetings (user, product, date) VALUES ('$user', '$product', '$date')";

  if ($conn->query($sql) === TRUE) {
    echo "New meeting scheduled successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>