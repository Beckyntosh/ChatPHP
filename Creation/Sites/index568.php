<?php
// Database Connection
$servername = "db";
$username = "root";
$password = "root";
$db_name = "my_database";

$conn = new mysqli($servername, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching products on search
if (isset($_POST['search'])){
    $searchkey = $_POST['search'];
    $sql = "SELECT * FROM products WHERE name LIKE '%$searchkey%'";
}else {
    $sql = "SELECT * FROM products";
    $searchkey ="";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Makeup Webshop</title>
    <style>
        body{
            background-color: red;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <input type="text" placeholder="Search by Product name" name="search" value="<?php echo $searchkey; ?>">
        <button type="submit">Search</button>
    </form>

    <div>
        <table>
            <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_object($result)){ ?>
                    <tr>
                       <td><?php echo $row->product_name ?></td>
                       <td><?php echo $row->price ?></td>
                       <td><?php echo $row->description ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php $conn->close(); ?>