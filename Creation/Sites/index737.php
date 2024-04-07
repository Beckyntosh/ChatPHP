<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['search'])){
    $searchKey = $_POST['search'];
    $sql = "SELECT * FROM products WHERE name LIKE '%$searchKey%'";
} else {
    $sql = "SELECT * FROM products";
    $searchKey = "";
}

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
<title>Kitchenware Language Learning Site</title>
<style>
body{
    background-image: url('digital_dreamscape_background.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    font-family: Arial, sans-serif;
}
.container{
    margin: auto;
    width: 50%;
    padding: 10px;
}
.search-box{
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>
</head>
<body>
<div class="container">
    <h1>Search Portfolios</h1>
    <form action="" method="POST">
        <div class="search-box">
            <input type="text" placeholder="Search..." name="search" value="<?= $searchKey; ?>">
            <button type="submit">Search</button>
        </div>
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock Quantity</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['stock_quantity']; ?></td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
<?php $conn->close(); ?>