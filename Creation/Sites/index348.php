<?php
// Connection parameters
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

// Create wishlist table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS wishlist (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(50) NOT NULL,
    item_description TEXT,
    reg_date TIMESTAMP
    )";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["item_name"])) {
    $itemName = $_POST["item_name"];
    $itemDescription = $_POST["item_description"];

    $stmt = $conn->prepare("INSERT INTO wishlist (item_name, item_description) VALUES (?, ?)");
    $stmt->bind_param("ss", $itemName, $itemDescription);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wishlist Management</title>
</head>
<body>

<h2>Add to Wishlist</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="item_name">Item Name:</label><br>
    <input type="text" id="item_name" name="item_name" required><br>
    <label for="item_description">Item Description:</label><br>
    <textarea id="item_description" name="item_description" rows="4" cols="50"></textarea><br>
    <input type="submit" value="Add to Wishlist">
</form>

<h2>Wishlist Items</h2>
<?php
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, item_name, item_description FROM wishlist";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<p><strong>Item:</strong> " . $row["item_name"]. " - <strong>Description:</strong> " . $row["item_description"]. "</p>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>