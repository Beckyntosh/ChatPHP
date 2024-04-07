<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["submit"])){
    $productName = $_POST["productName"];
    $productPrice = $_POST["productPrice"];
    $productDescription = $_POST["productDescription"];
    
    $image = $_FILES['image']['name'];
    $target = "images/".basename($image);

    $query = "INSERT INTO products(productName, productPrice, productDescription, image) VALUES ('$productName', '$productPrice', '$productDescription', '$image')";

    if(mysqli_query($conn, $query)){
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        }
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Makeup Webshop</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: pink;
                color: white;
                text-align: center;
            }
            form {
                margin: 0 auto;
                width: 200px;
            }
            input[type=file] {
                margin: 10px 0;
            }
            input[type=submit] {
                background-color: #FF69B4;
                color: white;
                padding: 10px 24px;
            }
        </style>
    </head>
    <body>
        <form method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="size" value="1000000">
        <div>
            <input type="text" name="productName" placeholder="Product Name">
        </div>
        <div>
            <input type="number" name="productPrice" placeholder="Product Price">
        </div>
        <div>
            <textarea name="productDescription" cols="40" rows="4" placeholder="Product Description"></textarea>
        </div>
        <div>
            <input type="file" name="image">
        </div>
        <div>
            <button type="submit" name="submit">Upload</button>
        </div>
        </form>
    </body>
</html>