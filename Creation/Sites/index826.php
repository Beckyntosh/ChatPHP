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

if(isset($_POST['submit'])) {
    $uploadDirectory = '/uploadedFiles/';
    $fileName = $_FILES['userfile']['name'];
    $uploadPath = $uploadDirectory . $fileName; 
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadPath)) {       
        $sql = "INSERT INTO products (product_image) VALUES ('".$fileName."')";
        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo 'File upload failed!';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Makeup Webshop</title>
    <style>
    body {
        background-color: #CCFF99;
        font-family: Arial, sans-serif;
    }
    form {
        width: 30%;
        margin: 100px auto;
        padding: 30px;
        border: 1px solid #555;
        background-color: #FFF9C4;
    }
    </style>
</head>
<body>
    <form action="#" method="post" enctype="multipart/form-data">
        <h3>Upload a Product</h3>
        <input type="file" name="userfile" required>
        <button type="submit" name="submit">Upload</button>
    </form>
</body>
</html>