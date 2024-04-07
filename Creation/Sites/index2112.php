<?php

// Establishing connection to the database
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

// SQL to create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS wishlist (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    itemName VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle the post request to add item to wishlist
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addItem'])) {
    $itemName = $_POST["itemName"];

    $sql = "INSERT INTO wishlist (itemName) VALUES ('$itemName')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Organic Foods Wishlist</title>
    <style>
        h2, form, table { text-align: center; margin-top: 20px; }
        table { width: 60%; margin-left: auto; margin-right: auto; }
        th, td { padding: 10px; border: 1px solid #ddd; }
    </style>
</head>
<body>

<h2>Add Item to Wishlist</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type="text" name="itemName" placeholder="Enter item name" required>
    <input type="submit" name="addItem" value="Add to Wishlist">
</form>

<h2>Wishlist Items</h2>
<table>
    <tr>
        <th>Item Name</th>
        <th>Added on Date</th>
    </tr>
    <?php
    $sql = "SELECT id, itemName, reg_date FROM wishlist";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["itemName"]."</td><td>".$row["reg_date"]."</td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'>No items found</td></tr>";
    }
    ?>
</table>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
