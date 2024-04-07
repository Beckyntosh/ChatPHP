<?php
$servername = "db";
$username = "root";
$password = "root";
$dbName = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // retrieve and sanitize POST data
    $userId = (int)$_POST['user_id'];
    $productId = (int)$_POST['product_id'];
    $rating = (int)$_POST['rating'];
    $content = htmlspecialchars($_POST['content']);

    // Insert review into the database
    $sql = "INSERT INTO reviews (user_id, product_id, rating, content)
            VALUES ($userId, $productId, $rating, '$content')";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

// Fetch all products with their respective ratings
$sql = "SELECT products.name, IFNULL(AVG(reviews.rating), 0) AS avg_rating
        FROM products LEFT JOIN reviews ON products.id = reviews.product_id
        GROUP BY products.name";
$result = $conn->query($sql);

?>

Art Deco Delight themed style
<style>
    body {
        font-family: 'GatsbyFLF-Roman';
        background-color: black;
        color: gold;
    }
    h1 {
        text-align: center;
        border-bottom: 2px solid gold;
    }
    table {
        width: 100%;
        text-align: center;
    }
    th, td {
        padding: 15px;
        border-bottom: 1px solid gold;
    }
</style>

<h1>Bicycle Portfolio</h1>

Display each product and their respective average ratings
<table>
<?php
while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["name"]. "</td><td>" . round($row["avg_rating"], 1). "/5</td></tr>";
}
?>
</table>

Review form
<form method="POST">
    User Id:<br>
    <input type="number" name="user_id"><br>
    Product Id:<br>
    <input type="number" name="product_id"><br>
    Rating:<br>
    <input type="number" name="rating" min="1" max="5"><br>
    Review:<br>
    <textarea name="content" rows="5" cols="40"></textarea><br>
    <input type="submit" value="Submit">
</form>

<?php
$conn->close();
?>