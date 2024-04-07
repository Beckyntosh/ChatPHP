<?php
$servername = "db";
$username = "root"; 
$password = "root"; 
$dbname = "my_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $stmt = $conn->prepare("INSERT INTO users (username, comment) VALUES (?, ?)");
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $comment);

        $username = $_POST["username"];
        $comment = $_POST["comment"];
        $stmt->execute();
        echo "Comment posted successfully.";
    }
    else if ($_SERVER["REQUEST_METHOD"] == "GET"){
        $stmt = $conn->prepare("SELECT username, comment FROM users");
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
            echo $v;
        }
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>  

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Art Supplies Event Planning and Management Site</title>
</head>
<body style="background: #fff8dc;">
  <form method="post"> 
    UserName:<br>
    <input type="text" name="username" value=""><br>
    Comment:<br>
    <input type="text" name="comment" value=""><br><br>
    <input type="submit" value="Post">
  </form>
</body>
</html>