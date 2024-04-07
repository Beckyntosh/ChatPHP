<?php
$host = "db";
$db = "my_database";
$user = "root";
$pass = "root";
$conn = new PDO("mysql:host=$host; dbname=$db", $user, $pass);

if($_POST){
    $name = $_FILES['myfile']['name'];
    $type = $_FILES['myfile']['type'];
    $data = file_get_contents($_FILES['myfile']['tmp_name']);
    $stmt = $conn->prepare("insert into users values('', :name, :type, :data)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':data', $data);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sunglasses Carrier Site</title>
    <style>
        body {
            background-color: #ADD8E6;
            color: #00008B;
        }
        h1 {
            text-align: center;
            color: #000080;
        }
        .input-group {
            max-width: 300px;
            margin: auto;
            padding: 20px;
        }
    </style>
</head>

<body>
    <h1>Resume Upload for Sunglasses Carrier Site</h1>
    <form method="POST" enctype="multipart/form-data" class="input-group">
        <input type="file" required name="myfile"><br>
        <button type="submit" name="upload">Upload</button>
    </form>
</body>
</html>