<!DOCTYPE html>
<html>
<body>
   <style>
       body {
           background-color: #c2b280;
           font-family: monospace;
           text-align: center;
       }
   </style>
   <h2>Upload Vector File</h2>
   <form action="upload.php" method="post" enctype="multipart/form-data">
       Select vector file to upload:
       <input type="file" name="fileToUpload" id="fileToUpload">
       <br></br>
       <input type="submit" value="Upload File" name="submit">
   </form>
   
<?php
$servername = "db";
$username = "root";
$password = "root";

$db = new mysqli($servername, $username, $password);

if ($db->connect_error) {
   die("Connection failed: " . $db->connect_error);
}

$db->query("CREATE DATABASE IF NOT EXISTS my_database");
$db->select_db('my_database');

$user_table = "CREATE TABLE IF NOT EXISTS users (
   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   username VARCHAR(30) NOT NULL,
   password VARCHAR(30) NOT NULL
)";

$db->query($user_table);

$product_table = "CREATE TABLE IF NOT EXISTS products (
   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(30) NOT NULL,
   file_path VARCHAR(100) NOT NULL
)";

$db->query($product_table);

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if ($_POST["submit"]) {
   if($imageFileType == "svg") {
       if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
           echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
           $db->query("INSERT INTO products (name, file_path) VALUES ('".basename( $_FILES["fileToUpload"]["name"])."', '".$target_file."')");
       } else {
           echo "Sorry, there was an error uploading your file.";
       }
   } else {
       echo "Sorry, non-vector files are not allowed. Only SVG files are allowed";
       $uploadOk = 0;
   }
}
?>
</body>
</html>