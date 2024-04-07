<?php
$host = 'db';
$user = 'root';
$pass = 'root';
$db = 'my_database';
$table_users = 'users';
$table_products = 'products';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['upload'])){
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    
    $path = 'uploads/'.$fileName;
    move_uploaded_file($fileTmpName,$path);

    $sql = "INSERT INTO $table_users(fileName,path) VALUES('$fileName','$path')";
    if($conn->query($sql) == true){
        echo 'File has been uploaded';
    } else{
        echo 'Failed to upload file';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Wines Language Learning Portfolio Upload</title>
    <style>
        body{
            background-color: #000;
            color: #fff;
            font-family: Arial, Helvetica, sans-serif;
            background-image: url('stellar-space-background.jpg');
            background-size: cover;
        }
        .container{
            width: 50%;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="file">
            <input type="submit" name="upload" value="Upload Portfolio">
        </form>
    </div>
</body>
</html>