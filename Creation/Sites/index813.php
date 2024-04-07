<html>
<head>
<title>Christmas Themed Makeup Webshop</title>
<style>
body {
    background: #ff9e2c;
    font-family: Arial, sans-serif;
}
.container {
    padding: 10px;
}
.btn {
    background: #FFF;
    padding: 5px 10px;
}
.header-section {
    background: green;
    color: #FFF;
    padding: 10px;
}
</style>
</head>
<body>
<div class="header-section">
    <h2>Christmas Themed Makeup Webshop</h2>
</div>
<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        Select file to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload File" name="submit" class="btn">
    </form>
</div>
</body>
</html>
<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO products (product_image)
    VALUES ('" . $target_file . "')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>