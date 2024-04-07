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

$query = "CREATE TABLE IF NOT EXISTS testimonials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    testimonial TEXT
);";
$conn->query($query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST["user_id"];
    $productId = $_POST["product_id"];
    $testimonialText = $_POST["testimonial"];

    $query = "INSERT INTO testimonials(user_id, product_id, testimonial) VALUES($userId, $productId, '$testimonialText');";
    $conn->query($query);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Opulent Odyssey - Testimonials</title>
    <style>
        /* Opulent Odyssey Themed Styles */
    </style>
</head>
<body>
    <h1>Add Testimonial</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="userId">User ID:</label><br>
        <input type="text" id="userId" name="user_id"><br>
        <label for="productId">Product ID:</label><br>
        <input type="text" id="productId" name="product_id"><br>
        <label for="testimonial">Testimonial:</label><br>
        <textarea id="testimonial" name="testimonial"></textarea><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php 
        $query = "SELECT * FROM testimonials;";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            echo "<div class='testimonial'>";
            echo "<h2>User {$row['user_id']} on Product {$row['product_id']}</h2>";
            echo "<p>{$row['testimonial']}</p>";
            echo "</div>";
        }
    ?>
</body>
</html>

<?php
$conn->close();
?>