<?php
$dbServername = "db";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "my_database";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $productId = $_POST["productId"];
    $review_text = $_POST["text"];
    
    $sql = "INSERT INTO reviews (name, text, productId) VALUES ('{$name}', '{$text}', {$productId})";

    if ($conn->query($sql) === TRUE) {
        echo "Review created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
  background-color: #ff9800;
  color: white;
  font-family: Arial, sans-serif;
}
</style>
</head>
<body>

<h2>Video Games Online Quiz and Test Site - Add a Review</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="name"><br>
  Product Id: <input type="number" name="productId"><br>
  Review Text: <textarea name="text"></textarea><br>
  <input type="submit">
</form>

</body>
</html>