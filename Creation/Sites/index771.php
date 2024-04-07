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

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $fileName = $_FILES['file']['name'];
    $filePath = 'uploads/'.$fileName;
    move_uploaded_file($_FILES['file']['tmp_name'],$filePath);

    $sql = "INSERT INTO users (certificate) VALUES ('$filePath')";
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
    <title>Skateboards Space Travel</title>
    <style>
    body {
        background-image: url('space.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
        color: white;
    }
    </style>
</head>
<body>
    <h1>Welcome to Stellar Space Skateboards Travel and Tourism!</h1>
    <form method="POST" enctype="multipart/form-data">
        <p>Please upload your certificate:</p><br>
        <input type="file" name="file">
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>