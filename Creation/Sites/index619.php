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

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    $certificate_path = $_FILES["file"]["name"];
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    $sql = "INSERT INTO certificates (user_id, product_id, path) VALUES ('$user_id', '$product_id', '$certificate_path')";
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
  <style>
  body{
    background: #FFDD97; 
    color: #84656E;
  }
  </style>
</head>
<body>
<h2>Sun-Kissed Serenity: Health & Wellness Real Estate</h2>
<p>Please upload your certificate:</p>
<form method="post" enctype="multipart/form-data">
  Select certificate to upload:
  <input type="file" name="file" id="file"><br>
  User-ID: <input type="number" name="user_id" id="user_id"><br>
  Product-ID: <input type="number" name="product_id" id="product_id"><br>
  <input type="submit" value="Upload Certificate" name="submit">
</form>

</body>
</html>