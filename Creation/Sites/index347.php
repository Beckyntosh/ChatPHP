<?php
// Connect to the database
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
$sql = "CREATE TABLE IF NOT EXISTS wishlist (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    userID INT(6) NOT NULL,
    itemName VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP
    )";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Insert an item into the wishlist
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addItem"])) {
    $userID = 1; // Assuming a fixed user for demo
    $itemName = htmlspecialchars($_POST["itemName"]);

    $stmt = $conn->prepare("INSERT INTO wishlist (userID, itemName) VALUES (?, ?)");
    $stmt->bind_param("is", $userID, $itemName);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

// Fetch all items in the wishlist
$sql = "SELECT id, itemName FROM wishlist WHERE userID=1"; // Assuming userID = 1 for demo
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Board Games Wishlist</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; }
        input[type="text"], button { padding: 10px; }
        button { background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        button:hover { opacity: 0.8; }
        ul { list-style-type: none; padding: 0; }
        li { margin: 10px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h2>My Board Games Wishlist</h2>
        <form method="POST">
            <input type="text" name="itemName" placeholder="Add new item..." required>
            <button type="submit" name="addItem">Add to Wishlist</button>
        </form>
        <h3>Wishlist Items</h3>
        <ul>
            <?php if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<li>".$row["itemName"]."</li>";
                }
            } else {
                echo "<li>Wishlist is empty.</li>";
            } ?>
        </ul>
    </div>
</body>
</html>