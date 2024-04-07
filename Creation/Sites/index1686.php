<?php
// Initialize MySQL connection settings
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

// Create Products Table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
category VARCHAR(30) NOT NULL,
description TEXT,
reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// HTML and PHP to handle adding of products
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addProduct'])) {
    $productName = $_POST['productName'];
    $productCategory = $_POST['productCategory'];
    $productDescription = $_POST['productDescription'];

    $sql = "INSERT INTO products (name, category, description)
    VALUES ('$productName', '$productCategory', '$productDescription')";

    if ($conn->query($sql) === TRUE) {
        echo "<div>Product added successfully</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Board Game Comparison Tool</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F0DB4F;
            color: #323330;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        input[type=text],
        textarea {
            padding: 10px;
            font-size: 16px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        input[type=submit] {
            background-color: #323330;
            color: #fff;
            border: none;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type=submit]:hover {
            background-color: darken(#323330, 10%);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Add New Product</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="productName" placeholder="Product Name" required>
            <input type="text" name="productCategory" placeholder="Product Category" required>
            <textarea name="productDescription" placeholder="Product Description" required></textarea>
            <input type="submit" name="addProduct" value="Add Product">
        </form>
    </div>
</body>

</html>

<?php
$conn->close();
?>
