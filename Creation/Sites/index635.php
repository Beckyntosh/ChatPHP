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

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: pink;
            font-family: Arial, sans-serif;
        }

        .product-card {
            border: 1px solid red;
            margin: 10px;
            padding: 10px;
            background-color: white;
        }
    </style>
</head>
<body>

<h2>Valentine's Makeup Webshop</h2>

<form action="" method="GET">
    <input type="text" name="search" placeholder="Search products...">
    <input type="submit" value="Search">
</form>

<?php

if (isset($_GET['search'])) {

    $search = mysqli_real_escape_string($conn,$_GET['search']);
    
    $sql = "SELECT * FROM products WHERE name LIKE '%$search%'";
    $result = $conn->query($sql);

    ?>
        <h3>Search results:</h3>
    <?php

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            ?>
                <div class="product-card">
                    <h4><?php echo $row['name']; ?></h4>
                    <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['name']; ?>">
                    <p><?php echo $row['description']; ?></p>
                </div>
            <?php
        }
    } else {
        echo "0 results";
    }
} 

$conn->close();

?>

</body>
</html>