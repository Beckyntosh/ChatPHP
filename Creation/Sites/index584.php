<?php
$servername = "db";
$username = "root";
$password = "root";
$dbName = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$search_query = $_POST['search'];

$sql = "SELECT * FROM products WHERE name LIKE '%$search_query%'";
$result = $conn->query($sql);

echo "<h1>Tropical Paradise Books</h1>";

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "Book Name: " . $row["name"]. " - Author: " . $row["author"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
<html>
<head>
<title>Tropical Paradise Books - Search Functionality</title>
<style>
body {
  background-image: url('tropical-paradise.jpg');
  color: #000;
}
</style>
</head>
<body>
<form method="post" action="">
  <input type="text" name="search" placeholder="Search for books.." required>
  <input type="submit" value="Search">
</form>
</body>
</html>