<?php
$host = "db";
$username = "root";
$password = "root";
$dbname = "my_database";
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['upload'])) { 
    $file = $_FILES['image']['tmp_name'];
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);

    if ($image_size == FALSE) {
        echo "That's not an image.";
    } else {
        if (!$insert = mysqli_query($conn, "INSERT INTO products VALUES ('','$image_name','$image')")) {
            echo "Problem uploading image.";
        } else {
            echo "Image uploaded.<p>Your image:</p><img src=get.php?id=$last_id>";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Children's Clothing Pet Adoption and Care Site</title>
    <style>
    body {
        font-family: 'Courier', monospace;
        background-color: #333;
        color: #fff;
    }
    form {
        margin: auto;
        width: 50%;
    }
    input[type="file"],
    input[type="submit"] {
        margin-top: 1rem;
    }
    </style>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="image">
        <input type="submit" value="Upload Image" name="upload">
    </form>
</body>
</html>