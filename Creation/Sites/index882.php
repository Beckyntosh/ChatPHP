<?php
// Establish database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create tables if they don't exist
    $sql = "CREATE TABLE IF NOT EXISTS blog_posts (
                id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255),
                content TEXT,
                author_id INT,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );
            
            CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(30),
                name VARCHAR(30),
                email VARCHAR(50),
                password VARCHAR(255)
            );";

    $conn->exec($sql);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Config for database connection
$host = "db";
$username = "root";
$password = "root";
$dbname = "my_database";
$dsn = "mysql:host=$host;dbname=$dbname";
$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

// Insert new blog post into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_id = $_POST['author_id']; // Example: In your real application, use authenticated user's ID

    $sql = "INSERT INTO blog_posts (title, content, author_id) VALUES (?, ?, ?)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$title, $content, $author_id]);
        echo "New post created successfully";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

$conn = new mysqli($host, $username, $password, $dbname);
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

// ...

// Continue with the rest of the code
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog Post</title>
    <style>
        /* ... Paste the styles ... */
    </style>
</head>
<body>

<div class="container">
    <h2>Create a New Blog Post</h2>
    <form method="post" action="">
... Paste the form content ...
    </form>
</div>

<h1>Urban Jungle Bedding Directory</h1>
<div id="container">
    <form method="POST">
... Paste the form content ...
    </form>
    <?php
    if (!empty($results)) {
        echo '<ul>';
        foreach ($results as $result) {
            echo '<li>'. $result['name'] .'</li>';
        }
        echo '</ul>';
    }
    ?>
</div>

<form method="post" action="" enctype="multipart/form-data">
    <h2>Upload PDF</h2>
    <input type="file" name="myfile" id="myfile">
    <input type="submit" value="Upload PDF" name="submit">
</form>

</body>
</html>