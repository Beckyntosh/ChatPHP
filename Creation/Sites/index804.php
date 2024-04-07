<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database"; 

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //query from users table
    $stmt = $conn->query("SELECT * FROM users");
    $users = $stmt->fetchAll();

    //query from products table
    $stmt = $conn->query("SELECT * FROM products");
    $products= $stmt->fetchAll();
    
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Classic Charm Virtual Try-On</title>
    <style> 
        body { font-family: Arial, sans-serif; margin:0; padding:0; font-size:16px; color:#333; }
        .container { width:90%; margin: 0 auto; }
        h1 { text-align: center; color: #5C3548;}
        .virtual-try { width:50%; margin: 20px auto; padding:10px; border: 1px solid #5C3548; border-radius: 5px }
        .virtual-try input[type="file"] { display: none; }
        .virtual-try label {  padding: 10px; color: white; background-color: #5C3548; cursor:pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Classic Charm Virtual Try-On</h1>
        <form class="virtual-try" enctype="multipart/form-data">
            <input type="file" id="photo" name="photo"/>
            <label for="photo">Choose a photo to begin</label>
            <button type="submit">Try It!</button>
        </form>
    </div>
</body>
</html>
