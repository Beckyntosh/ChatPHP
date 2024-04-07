<?php
    $host = "db";
    $username = "root";
    $password = "root";
    $db_name = "my_database";
    $connection = new mysqli($host, $username, $password, $db_name);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    if (isset($_POST['search'])){
        $searchKey = $_POST['search'];
        $sql = "SELECT * FROM products WHERE product_name LIKE '%$searchKey%'";
        $result = mysqli_query($connection, $sql);
    } else {
        $sql = "SELECT * FROM products";
        $result = mysqli_query($connection, $sql);
        $searchKey = "";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Spring Themed Makeup Webshop</title>
    <style type="text/css">
        body{
            background-color: #E6E6FA;
        }
    </style>
</head>

<body>
<div class="container">
    <h2>Spring Themed Makeup Webshop</h2>
    <form action="" method="POST">
        <input type="text" name="search" class='form-control' placeholder="Search by Product Name" value="<?php echo $searchKey; ?>" > 
        <button class="btn btn-primary">Search</button>
    </form>
    <br>
    <table class="table table-bordered">
        <tr>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
        <?php while( $row = mysqli_fetch_object($result)) {?>
            <tr>
                <td><?php echo $row->product_name ?></td>
                <td><?php echo $row->product_descr ?></td>
                <td><?php echo '$ '.$row->price ?></td>
            </tr>
        <?php }?>
    </table>
</div>
</body>

</html>
<?php
    $connection->close();
?>