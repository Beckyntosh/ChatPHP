<?php
$host = "db";
$db   = "my_database";
$user = "root";
$pass = "root";
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$productsQuery = "SELECT * FROM products";
$productsResult = $conn->query($productsQuery);

function getProductDetails($productId){
    global $conn;
    if($query = $conn->prepare("SELECT * FROM products WHERE id=?")){
        $query->bind_param("i", $productId);
        $query->execute();
        return $query->get_result()->fetch_assoc();
    }
}

$comparison = [];
if (isset($_POST['product'])) {
    foreach ($_POST['product'] as $productId) {
        $comparison[] = getProductDetails($productId);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
body {font-family: Arial, sans-serif;background-color: #eff7fa;color: #3f6b72;}
table {border: 2px solid #3f6b72;border-collapse: collapse;width: 100%;}
th, td {border: 1px solid #3f6b72;padding: 10px;text-align: center;}
</style>
</head>
<body>
    <form method="post">
        <select multiple name="product[]">
            <?php
            while($row = $productsResult->fetch_assoc()){
                echo "<option value='".$row['id']."'>".$row['name']."</option>";
            }
            ?>
        </select>
        <input type="submit" value="Compare">
    </form>
    <?php if(count($comparison) > 0): ?>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($comparison as $product):?>
            <tr>
                <td><?=$product['name']?></td>
                <td><?=$product['description']?></td>
                <td><?=$product['price']?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <?php endif; ?>
</body>
</html>