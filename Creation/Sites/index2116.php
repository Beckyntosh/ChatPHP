<?php
// Database connection setup
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

// Create wishlist table if it does not exist
$createTableSql = "CREATE TABLE IF NOT EXISTS wishlists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($createTableSql)) {
    echo "Error creating table: " . $conn->error;
}

// Adding items to the wishlist
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["itemName"])) {
    $itemName = $_POST["itemName"];

    $stmt = $conn->prepare("INSERT INTO wishlists (item_name) VALUES (?)");
    $stmt->bind_param("s", $itemName);

    if (!$stmt->execute()) {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Art Supplies Wishlist</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; }
        input[type=text], button { padding: 10px; }
        ul { list-style-type: none; padding: 0; }
        li { padding: 8px; margin-bottom: 2px; background-color: #f2f2f2; }
    </style>
</head>
<body>

<div class="container">
    <h2>Art Supplies Wishlist</h2>
    <form action="" method="post">
        <input type="text" name="itemName" placeholder="Enter Art Supply Name">
        <button type="submit">Add to Wishlist</button>
    </form>

    <h3>My Wishlist</h3>
    <ul>
        <?php
        $sql = "SELECT id, item_name FROM wishlists";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<li>" . htmlspecialchars($row["item_name"]) . "</li>";
            }
        } else {
            echo "<li>No items in wishlist</li>";
        }
        ?>
    </ul>
</div>

</body>
</html>

<?php
$conn->close();
?>
