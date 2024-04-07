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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $userId = $_POST['userId'];
        $productId = $_POST['productId'];
        $rating = $_POST['rating'];

        $sql = "INSERT INTO ratings (user_id, product_id, rating) VALUES ($userId, $productId, $rating)";

        $conn->query($sql);
    }

    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
            }

            .product {
                border: 1px solid #000;
                margin: 10px;
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="product">
                <h2><?php echo $row['name']; ?></h2>
                <form method="POST">
                    <input type="hidden" name="userId" value="1">
                    <input type="hidden" name="productId" value="<?php echo $row['id']; ?>">
                    <label for="rating">Rating:</label>
                    <input type="number" id="rating" name="rating" min="1" max="5">
                    <input type="submit" value="Submit">
                </form>
            </div>
        <?php endwhile; ?>
    </body>
</html>

<?php $conn->close(); ?>