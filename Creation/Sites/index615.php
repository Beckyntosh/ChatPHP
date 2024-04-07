<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['add_to_cart'])) {
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    
    $sql = "INSERT INTO cart (user_id, product_id) VALUES ('$user_id', '$product_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Product added to cart successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFA07A;
            color: #5D4038;
        }
        .btn {
            background-color: #3E2723;
            color: #FFCCBC;
            padding: 10px 20px;
            margin: 10px 0;
            border: none;
            cursor: pointer;
            width: 30%;
            opacity: 0.9;
        }
    </style>
</head>
<body>
<form method="post" action="">
    User ID: <input type="text" name="user_id"><br>
    Product ID: <input type="text" name="product_id"><br>
    <input type="submit" name="add_to_cart" value="Add to Cart" class="btn">
</form>
</body>
</html>