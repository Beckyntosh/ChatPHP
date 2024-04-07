<?php
$database = "my_database";
$password = "root";
$servername = "db";
$username = "root";

// Create database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search_term = $_POST['search_term'];

$sql = "SELECT * FROM products WHERE product_name LIKE '%$search_term%'";

$resultSet = $conn->query($sql);

// check to see if there are any results
if ($resultSet->num_rows > 0) {
    echo '<div class="gallery-container">';
    while ($row = $resultSet->fetch_assoc()) {
        echo '<div class="gallery-item">';
        echo '<h2>' . $row["product_name"] . '</h2>';
        echo '<img src="' . $row["product_image"] . '">';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo "No results found";
}
$conn->close();
?>

<form action="" method="POST">
    <input type="text" name="search_term">
    <input type="submit" value="Search Galleries">
</form>