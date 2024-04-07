<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1501594907352-04cda38ebc29');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            color: #FFFFFF;
            font-family: Arial, Helvetica, sans-serif;
        }
        h1 {
            font-size: 2em;
            text-align: center;
            margin-top: 10px;
        }
        .content {
            max-width: 1000px;
            margin: 0 auto;
        }
        input[type="text"], input[type="email"], input[type="password"], input[type="submit"] {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Camera Course Creation</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <label for="name">Course Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <input type="submit" value="Create">
    </form>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <input type="text" name="search" placeholder="Search how-to articles">
        <input type="submit" name="search_submit" value="Search">
    </form>

    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
        Please select plugin to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Plugin" name="plugin_submit">
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

$sql = "CREATE TABLE IF NOT EXISTS courses (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255)
)";
$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS products (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255),
description TEXT,
category VARCHAR(100),
price DECIMAL(10, 2),
stock_quantity INT
)";
$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS users (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30),
name VARCHAR(30),
email VARCHAR(50),
password VARCHAR(255)
)";
$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS articles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
content TEXT NOT NULL,
category VARCHAR(30) NOT NULL
)";
$conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name'])) {
        $name = $conn->real_escape_string($_POST["name"]);
        $sql = "INSERT INTO courses (name) VALUES ('$name')";
        if ($conn->query($sql) === TRUE) {
            echo "New course created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['search_submit'])) {
        $search_keyword = $conn->real_escape_string($_POST["search"]);
        $sql = "SELECT id, title, category FROM articles WHERE title LIKE '%$search_keyword%' OR category LIKE '%$search_keyword%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<p>id: " . $row["id"]. " - Name: " . $row["title"]. " " . $row["category"]. "</p>";
            }
        } else {
            echo "<p>No results found!</p>";
        }
    } elseif (isset($_POST['plugin_submit'])) {
        $target_dir = "plugins/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if($fileType != "php" ) {
            echo "Sorry, only PHP files are allowed.";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}

$conn->close();
?>
