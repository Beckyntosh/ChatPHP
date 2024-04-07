<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_POST) {
    // Assigning POST values to variables.
    $rating = $_POST['rating_value'];
    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];
		
    $sql = "INSERT INTO ratings (rating, product_id, user_id) VALUES ($rating, $product_id, $user_id)";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

echo '<h3>Rate Items:</h3>';
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<form action="" method="post">
          <label>' . $row["product_name"]. ':</label>
          <input type="hidden" name="product_id" value="' . $row["product_id"]. '">
          <input type="number" name="rating_value" min="1" max="5">
          <input type="submit">
        </form>';
    }
} else {
    echo "No products found";
}

$conn->close();
?>