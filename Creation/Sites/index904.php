<?php

// Database connection
$dbServername = "db";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "my_database";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create ratings table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS ratings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    user_id INT,
    rating INT CHECK (rating >= 1 AND rating <= 5),
    comment TEXT,
    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rate a Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #33ff00;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }
        input[type="submit"] {
            background-color: #33ff00;
            border: none;
            color: black;
            padding: 10px 20px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }
        input[type="number"], textarea {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Rate a Product</h2>
    <form action="" method="post">
        <label for="product_id">Product ID:</label><br>
        <input type="number" id="product_id" name="product_id" required><br>
        <label for="user_id">User ID:</label><br>
        <input type="number" id="user_id" name="user_id" required><br>
        <label for="rating">Rating:</label><br>
        <input type="number" id="rating" name="rating" min="1" max="5" required><br>
        <label for="comment">Comment:</label><br>
        <textarea id="comment" name="comment" rows="4" required></textarea><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect value of input field
    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO ratings (product_id, user_id, rating, comment) VALUES (?, ?, ?, ?)";

    // Prepare statement
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Bind params
    $stmt->bind_param("iiis", $product_id, $user_id, $rating, $comment);
    
    // Execute statement
    if ($stmt->execute() === true) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

</body>
</html>

<?php
// Database connection setup
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

// Create AddressBook table if it doesn't exist
try {
    $sql = "CREATE TABLE IF NOT EXISTS AddressBook (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100),
        email VARCHAR(100),
        phone VARCHAR(30),
        address TEXT
    )";

    $conn->exec($sql);
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
    die();
}

// Handle POST request to insert data
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["name"])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
  
    try {
        $sql = "INSERT INTO AddressBook (name, email, phone, address)
        VALUES ('$name', '$email', '$phone', '$address')";
        $conn->exec($sql);
        echo "New record created successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Book Management</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #F4A460; /* sandy brown */
            color: #8B4513; /* saddle brown */
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #FFDEAD; /* navajowhite */
            padding: 20px;
            border-radius: 10px;
        }
        input[type=text], input[type=email], textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
        }
        input[type=submit] {
            backgroundColor: #8B4513;
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #7B3F00;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add New Contact</h2>
    <form method="post">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" required>

        <label for="address">Address</label>
        <textarea id="address" name="address" required></textarea>

        <input type="submit" value="Submit">
    </form>
</div>

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

function runQuery($pdo, $sql, $args=NULL)
{
    if (!$args)
     {
         return $pdo->query($sql);
     }
    $stmt = $pdo->prepare($sql);
    $stmt->execute($args);
    return $stmt;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["edit"]))
    {
        $sql = "UPDATE comments SET comment=? WHERE id=?";
        runQuery($pdo, $sql, [ $_POST["comment"], $_POST["id"] ]);
    }
    else
    {
        $sql = "INSERT INTO comments (username, comment) VALUES (?, ?)";
        runQuery($pdo, $sql, [ $_POST["username"], $_POST["comment"] ]);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Spirits Real Estate</title>
</head>
<body style="background-color: #212121; color: #f9a825;">
<h2 style="text-align:center;">Comments</h2>
<form method="post">
    <label>
        Username:
        <input type="text" name="username">
    </label>
    <label>
        Comment:
        <textarea name="comment"></textarea>
    </label>
    <input type="submit" value="Post Comment">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["edit_id"])) {
?>
<form method="post">
    <input type="hidden" name="id" value="<?php echo $_GET["edit_id"]; ?>">
    <label>
        Edit Comment:
        <textarea name="comment"><?php echo $_GET["edit_comment"]; ?></textarea>
    </label>
    <input type="submit" name="edit" value="Save Changes">
</form>
<?php
}
?>
<h3 style="text-align:center;">Comment Listing</h3>
<?php
$sql = "SELECT * FROM comments";
$stmt = runQuery($pdo, $sql);
while ($row = $stmt->fetch())
{
?>
<p>
    <strong><?php echo $row["username"]; ?></strong><br>
    <?php echo $row["comment"]; ?><br>
    <a href="?edit_id=<?php echo $row["id"]; ?>&edit_comment=<?php echo urlencode($row["comment"]); ?>">edit</a>
</p>
<?php
}?>
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // An Upload button is clicked
    if (isset($_FILES['podcast_file']) && $_FILES['podcast_file']['error'] === UPLOAD_ERR_OK) {
        $file_tmp_path = $_FILES['podcast_file']['tmp_name'];
        $file_name = $_FILES['podcast_file']['name'];
        $file_size = $_FILES['podcast_file']['size'];
        $file_type = $_FILES['podcast_file']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['podcast_file']['name'])));
        
        // Check if valid podcast files
        if($file_ext === 'mp3' || $file_ext === 'aac'  || $file_ext === 'wav') {
            // Upload folder - make sure to create it in correct path
            $upload_dir_path = 'uploads/';
            if (!file_exists($upload_dir_path)) {
                mkdir($upload_dir_path, 0777, true);
            }

            if (move_uploaded_file($file_tmp_path, $upload_dir_path . $file_name)) {
                // Insert into the database
                $stmt = $pdo->prepare('INSERT INTO products (product_file, product_name, product_size) VALUES (?, ?, ?)');
                $stmt->execute([$upload_dir_path . $file_name, $file_name, $file_size]);

                echo 'File Uploaded and Saved Successfully';
            } else {
                echo 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            }
        } 
        else {
            echo 'Invalid File Extension - Please Upload MP3, AAC or WAV Files';
        }    
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <style>
        body {
            background: #f9f9f9;
        }
        form {
            text-align: center;
            padding: 40px;
        }
    </style>
    <title>Upload Podcast</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <label for="podcast_file">Upload Podcast File:</label>
        <input type="file" name="podcast_file" id="podcast_file">
        <input type="submit" value="Upload File" name="submit">
    </form> 
</body>
</html>
<?php
$conn->close();
?>