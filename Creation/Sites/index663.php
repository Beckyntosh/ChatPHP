<?php
$host = 'db';
$db   = 'my_database';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

echo "<html>
<style>
body {
    background-color: #f5f5f5;
    font-family: 'Urbanist', sans-serif;
    color: #333;
}
.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 10px;
}
</style>
<body>
<div class='container'>
   <h1>Smartphone App Upload</h1>
   <form method='POST' action='' enctype='multipart/form-data'>
      <input type='file' name='file'>
      <input type='submit' name='upload' value='Upload'>
   </form>
</div>
</body>
</html>
";

if(isset($_POST["upload"])){

    $file_name = $_FILES['file']['name'];
    $temp_name = $_FILES['file']['tmp_name'];
    $folder = "uploads/";

    if(move_uploaded_file($temp_name, $folder.$file_name)){
        echo $file_name." Uploaded Successfully.<br>";

        // insert file info into database
        try {
            $stmt = $pdo->prepare("INSERT INTO products (product_name) VALUES (:product_name)");
            $stmt->execute(['product_name' => $file_name]);

            echo "File info saved to database.<br>";

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }else{
        echo "File Upload Failed!";
    }
}
?>