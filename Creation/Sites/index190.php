<?php
// Database Connection
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

// Create tables if not exist
$sql = "CREATE TABLE IF NOT EXISTS Products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
description VARCHAR(255),
price DECIMAL(10,2) NOT NULL,
genre VARCHAR(50),
release_date DATE,
img_url VARCHAR(255),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
// Table created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS Comparison (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_id INT(6) UNSIGNED,
FOREIGN KEY (product_id) REFERENCES Products(id),
user_id INT(6) UNSIGNED,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
// Table created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

// Frontend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST['productId'];
    $userId = $_POST['userId']; // Assuming you have a user identification mechanism

    $sql = $conn->prepare("INSERT INTO Comparison (product_id, user_id) VALUES (?, ?)");
    $sql->bind_param("ii", $productId, $userId);

    if ($sql->execute() === TRUE) {
        echo "Product successfully added to comparison tool!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $sql->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Post-Apocalyptic Video Games Comparison</title>
    <style>
        body{
            font-family: 'Arial', sans-serif;
            background-color: #333;
            color: #ddd;
            text-align: center;
        }
        .container{
            width: 80%;
            margin: auto;
        }
        .product{
            display: inline-block;
            margin: 20px;
            background-color: #444;
            padding: 10px;
            border-radius: 8px;
        }
        img{
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Compare Your Favorite Post-Apocalyptic Video Games</h1>
        <div>
            <?php
            // Fetch All Products
            $sql = "SELECT * FROM Products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="product">';
                    echo '<h2>'. $row["name"]. '</h2>';
                    echo '<p>'. $row["description"]. '</p>';
                    echo '<p>Genre: '. $row["genre"]. '</p>';
                    echo '<p>Price: $'. $row["price"]. '</p>';
                    echo '<p>Release Date: '. $row["release_date"]. '</p>';
                    echo '<img src="'. $row["img_url"]. '" alt="'. $row["name"]. '">';
                    echo '<form action="" method="post">
                            <input type="hidden" name="productId" value="'. $row["id"]. '">
                            <input type="hidden" name="userId" value="1"> 
                            <input type="submit" value="Add to Compare">
                          </form>';
                    echo '</div>';
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>
</body>
</html>