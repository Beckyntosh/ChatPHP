<?php
// Database connection settings
$host = 'db';
$db   = 'my_database';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

// DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Handle Add to Favorites
if (isset($_POST['add_to_favorites'])) {
    $productId = $_POST['product_id'];
    $userId = 1; // Static user for demonstration
    
    $sql = "CREATE TABLE IF NOT EXISTS favorites (
                id INT AUTO_INCREMENT PRIMARY KEY,
                product_id INT,
                user_id INT,
                FOREIGN KEY(product_id) REFERENCES products(id),
                FOREIGN KEY(user_id) REFERENCES users(id)
            )";
    $pdo->exec($sql);

    $insertSql = "INSERT INTO favorites (product_id, user_id) VALUES (?, ?)";
    $stmt = $pdo->prepare($insertSql);
    $stmt->execute([$productId, $userId]);
}

// Retrieve all products
$stmt = $pdo->query('SELECT * FROM products');
$products = $stmt->fetchAll();

// Password Change Section begins here. Corrected typo in $_POST variable.
if(isset($_POST['change'])){
    $username = $_POST['username'];
    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];
    
    $result = $pdo->query("SELECT password FROM users WHERE username = '$username'");

    if($result->rowCount() > 0){
        $row = $result->fetch();
        if($oldpassword == $row['password']){
            $update = $pdo->prepare("UPDATE users SET password = :newpassword WHERE username = :username");
            $update->execute([':newpassword' => $newpassword, ':username' => $username]);

            if($update){
                echo "Password changed successfully!";
            } else {
                echo "Failed to change password!";
            }

        } else {
            echo "Old password is incorrect!";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Combined Site Features</title>
    <style>
        body {
            background-color: #0A0A23;
            color: #FFF;
            font-family: Arial, sans-serif;
        }
        .product-card, .container {
            background-color: #161645;
            border: 1px solid #444;
            padding: 20px;
            margin-bottom: 20px;
        }
        .add-to-favorites, input[type=submit] {
            background-color: #24a0ed;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        input[type=text], input[type=password] {
            padding: 12px;
            width: 100%;
        }
        form {
            border: 2px solid #ccc;
            padding: 20px;
            background-color: #fff;
            color: #000;
        }
    </style>
</head>
<body>
<h1>Combined Site Features</h1>

Products Section
<section>
    <h2>Products</h2>
    <?php foreach ($products as $product): ?>
        <div class="product-card">
            <h3><?= htmlspecialchars($product['name']) ?></h3>
            <p><?= htmlspecialchars($product['description']) ?></p>
            <form action="" method="post">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                <button type="submit" name="add_to_favorites" class="add-to-favorites">Add to Favorites</button>
            </form>
        </div>
    <?php endforeach; ?>
</section>

Change Password Section
<section>
    <h2>Change Password</h2>
    <form method="post" action="">
        <label>Username:</label><br>
        <input type="text" name="username" required><br>
        <label>Old Password:</label><br>
        <input type="password" name="oldpassword" required><br>
        <label>New Password:</label><br>
        <input type="password" name="newpassword" required><br>
        <input type="submit" name="change" value="Change Password">
    </form>
</section>

</body>
</html>
