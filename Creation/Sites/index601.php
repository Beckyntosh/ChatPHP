<!DOCTYPE html>
<html>
<head>
    <title>Autumn Makeup Webshop</title>
    <style>
        body {
            background-color:#803300;
            color:#ffcc99;
        }
    </style>
</head>
<body>
 
<form action="index.php" method="post">
    <input type="text" placeholder="Enter the product name" name="search">
    <input type="submit" name="submit" value="Search">
</form>
 
</body>
</html>

<?php

$host = "db";
$user = "root";
$pass = "root";
$db = "my_database";
  
$conn = new mysqli($host, $user, $pass, $db);
  
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
  
if(isset($_POST["submit"])) {
    $str = $_POST["search"];
    $sth = $conn->prepare("SELECT * FROM `products` WHERE Title LIKE '%$str%'");

    $sth->execute();

    $result = $sth->get_result();

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "Title: ".$row['Title'].", Price: ".$row['Price'].", Description: ".$row['Description']."<br>";
        }
    }
    else {
        echo "No record found";
    }
}

$conn->close();
?>