<?php
// Set up connection parameters
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
    item_name VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST['item'];
  
    // Insert item into the database
    $sql = "INSERT INTO wishlist (item_name) VALUES ('$item')";
  
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wishlist Manager</title>
</head>
<body>

<h2>Organic Foods Wishlist</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="item">Add item to Wishlist:</label><br>
    <input type="text" id="item" name="item" required><br>
    <input type="submit" value="Submit">
</form>

<h3>Your Wishlist</h3>
<ul>
<?php
$sql = "SELECT id, item_name FROM wishlist";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<li>" . $row["item_name"]. "</li>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</ul>

</body>
</html>
