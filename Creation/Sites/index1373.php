<?php
// Connect to the Database
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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST["productName"];
    $productSize = $_POST["productSize"];
    $quantity = $_POST["quantity"];

    // Insert into database
    $sql = "INSERT INTO orders (productName, productSize, quantity)
    VALUES ('$productName', '$productSize', '$quantity')";

    if ($conn->query($sql) === TRUE) {
      echo "<p style='color:green;'>New record created successfully</p>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Order - Video Game Webshop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #ffe0f0;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            background-color: #fdb9c8;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        input[type=text], input[type=number] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ddd;
            box-sizing: border-box; /* Added for CSS box model consistency */
        }
        input[type=submit] {
            width: 95%;
            padding: 10px;
            background-color: #f54a9a;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #f76baf;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add Your Custom Order</h2>
    <form action="" method="post">
        <input type="text" name="productName" placeholder="Product Name (e.g., wooden dining table)" required>
        <input type="text" name="productSize" placeholder="Product Size (e.g., 120x75 cm)" required>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <input type="submit" value="Add Order">
    </form>
</div>

</body>
</html>
