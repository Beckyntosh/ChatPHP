<?php
$server = "db";
$database = "my_database";
$username = "root";
$password = "root";

//Create connection
$conn = new mysqli($server, $username, $password,$database);

//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO products (product_image) VALUES ('$target_file')";

        if ($conn->query($sql) === TRUE) {
            echo "File uploaded successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }              
    }else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Makeup Webshop</title>
<style>
body{
  background-color: pink;
  color: white;
  font-family: "Lucida Console", "Courier New", monospace;
}
h1{
  text-align: center;
}
</style>
</head>
<body>
<h1>Valentine Makeup Webshop</h1>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>