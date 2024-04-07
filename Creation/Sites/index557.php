<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS Posts (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(100),
content TEXT,
author VARCHAR(50),
date_posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($sql);

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];

    $insert = "INSERT INTO Posts(title, content, author) VALUES('$title', '$content', '$author')";
    $conn->query($insert);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

$sql = "SELECT id, title, content, author, date_posted FROM Posts ORDER BY date_posted DESC";
$result = $conn->query($sql);
$postData = "";
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $postData .= "<div style='background:#EEE; margin-bottom:20px; padding:10px; border-radius:5px;'>
        <h2>{$row['title']}</h2>
        <p>{$row['content']}</p>
        <p>Posted by: {$row['author']} on {$row['date_posted']}</p>
        </div>";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html style="background-color: #F5F5DC;">
<head>
    <title>Rustic Retreat - Children's Clothing Home Renovation and Interior Design Site</title>
    <style>
        body{font-family: Arial, sans-serif; max-width: 700px; margin: auto;}
        input[type="text"], textarea{width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px;}
        input[type="submit"]{color: #FFF; background-color: #333; padding: 10px 15px; border-radius: 5px; border: none;}
        .postForm, .post{margin-bottom: 50px;}
    </style>
</head>
<body>
    <div class="postForm">
        <form method="post" action="">
            <input type="text" name="title" placeholder="Post Title">
            <textarea name="content" placeholder="Write your post here..."></textarea>
            <input type="text" name="author" placeholder="Author">
            <input type="submit" name="submit" value="Post">
        </form>
    </div>
    <div class="post">
     <?php echo $postData; ?>
    </div>
</body>
</html>