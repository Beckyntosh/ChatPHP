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

$query = 'CREATE TABLE IF NOT EXISTS uploads (
          id INT AUTO_INCREMENT PRIMARY KEY,
          name VARCHAR(100),
          mimetype VARCHAR(100),
          data LONGBLOB)';
$pdo->query($query);

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['userfile'])) {

  $name = $_FILES['userfile']['name'];
  $mimetype = $_FILES['userfile']['type'];
  
  if($mimetype == 'application/pdf') {
    $data = file_get_contents($_FILES['userfile']['tmp_name']);
    $stmt = $pdo->prepare("INSERT INTO uploads (name, mimetype, data) VALUES (?, ?, ?)");
    $stmt->execute([$name, $mimetype, $data]);
  }
  
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Books Webstore</title>
  <style type="text/css">
    body { background-color: #ff0000; }
    form { margin: 0 auto; width: 250px; }
    input { padding: 10px; font-size: inherit; }
  </style>
</head>
<body>
<h2>Upload a Book PDF</h2>

<form method="post" enctype="multipart/form-data">
  <input type="file" name="userfile">
  <input type="submit" value="Upload">
</form>

</body>
</html>
