<?php
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

$sql = "CREATE TABLE IF NOT EXISTS articles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
content TEXT NOT NULL,
category VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "<p>Table MyGuests created successfully</p>";
} else {
    echo "<p>Error creating table: " . $conn->error."</p>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_keyword = $_POST["search"];
    $sql = "SELECT id, title, category FROM articles WHERE title LIKE '%$search_keyword%' OR category LIKE '%$search_keyword%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<p>id: " . $row["id"]. " - Name: " . $row["title"]. " " . $row["category"]. "</p>";
        }
    } else {
        echo "<p>No results found!</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<style>
body {
    background-image: url('https://images.unsplash.com/photo-1501594907352-04cda38ebc29');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;
}
</style>
<body>
    <h2>Beach Themed Desktop Computers Blog</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <input type="text" name="search" placeholder="Search how-to articles">
        <input type="submit" name="submit" value="Search">
    </form>
</body>
</html>
