<?php
    $host     = 'db';  
    $database = 'my_database';  
    $user     = 'root';  
    $password = 'root';  
     
    try {
        // Establish a connection to the database
        $db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Select data from the 'users' table
        $stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => 1]); 
        $user = $stmt->fetch();
        
        // Selects from the 'products' table
        $stmt = $db->prepare("SELECT * FROM products WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user['id']]); 
        $products = $stmt->fetchAll();
    }
    catch(PDOException $e) {
        echo "Error : " . $e->getMessage();
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Books Pet Adoption and Care Site</title>
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Source Serif Pro', serif;
            background-color: #F7F9FB;
            color: #3E4C59;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Welcome <?=htmlspecialchars($user['name'])?></h1>
    <p>Your Products:</p>
    <ul>
        <?php foreach ($products as $product):?>
            <li><?=htmlspecialchars($product['name'])?></li>
        <?php endforeach; ?>
    </ul>
    <p>Connect with Facebook: (Functional button when API integrated)</p>
    <button style="background-color:#3b5998;color:#fff">Connect with Facebook</button>
</body>
</html>