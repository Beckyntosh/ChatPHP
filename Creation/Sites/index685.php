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

$search = '%'.$_POST['search'].'%';

$sql = "SELECT * FROM albums WHERE name LIKE ?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$search]);

while ($row = $stmt->fetch())
{
    echo $row['name']."<br />\n";
}
?>
<!DOCTYPE html>
<html>
<head>
   <title>School Supplies Carrier</title>
   <style>
      body {
         background-color: #FF7F50;
         font-family: Arial, sans-serif;
      }
      form {
         margin-top: 50px;
         text-align: center;
      }
   </style>
</head>
<body>
   <form method="post">
      <input type="text" name="search" required>
      <input type="submit" value="Search Albums">
   </form>
</body>
</html>