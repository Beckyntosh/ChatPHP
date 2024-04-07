<?php
// Initialize connection variables
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

// Create table if not exists
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS wishlists (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userEmail VARCHAR(50) NOT NULL,
    bookId INT(11) NOT NULL,
    dateAdded TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($tableCreationQuery)) {
    echo "Error creating table: " . $conn->error;
}

// Adding item to wishlist
if (isset($_POST['add_to_wishlist'])) {
    $userEmail = $_POST['userEmail'];
    $bookId = $_POST['bookId'];

    $insertQuery = "INSERT INTO wishlists (userEmail, bookId) VALUES ('$userEmail', '$bookId')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
}

// Fetching wishlist items
function fetchWishlistItems($conn, $userEmail) {
    $selectQuery = "SELECT * FROM wishlists WHERE userEmail='$userEmail'";
    $result = $conn->query($selectQuery);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Book ID: " . $row['bookId'] . "<br/>";
        }
    } else {
        echo "0 Wishlist Items";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wishlist</title>
</head>
<body>

<h2>Add to Wishlist</h2>
<form method="post" action="">
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="userEmail" required><br>
    <label for="bookId">Book ID:</label><br>
    <input type="number" id="bookId" name="bookId" required><br><br>
    <input type="submit" name="add_to_wishlist" value="Add to Wishlist">
</form>

<h2>Your Wishlist</h2>
<?php if (isset($_POST['userEmail'])) fetchWishlistItems($conn, $_POST['userEmail']); ?>

</body>
</html>

<?php
$conn->close();
?>
