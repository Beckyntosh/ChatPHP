<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  
if(isset($_POST['upload'])){
  
  $file = $_FILES['file']['name'];
  $target = "images/".basename($file);
  
  $product_name= $_POST['product_name'];
  $product_description= $_POST['product_description'];
  
  $query = "INSERT INTO products (name, description, image) values ('$product_name','$product_description','$target')";
  
  if(mysqli_query($conn, $query) && move_uploaded_file($_FILES['file']['tmp_name'], $target)){
    echo "File uploaded successfully";
  } else {
    echo "Failed to upload file.";
  }
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Makeup Webshop</title>
<style>
body {
  background-image: url('https://img.freepik.com/free-vector/creative-beautiful-abstract-summer-background_1302-21282.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>
</head>
<body>
<form method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="size" value="1000000">
  <input type="text" name="product_name" placeholder="Product Name">
  <input type="text" name="product_description" placeholder="Product Description">
  <input type="file" name="file">
  <button type="submit" name="upload">Upload</button>
</form>
</body>
</html>
<?php $conn->close(); ?>