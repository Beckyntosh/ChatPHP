<!DOCTYPE html>
<html>
<body style="background-color:pink;">

<h1 style="color:purple;">Create Your Makeup Profile</h1>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  Username: <input type="text" name="username"><br>
  Password: <input type="password" name="password"><br>
  Email: <input type="text" name="email"><br>
  <input type="submit" name="create" value="Create Profile">
</form>

</body>
</html>

<?php

$host = 'db';
$root = 'root';
$root = 'root';
$db = 'my_database';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $root, $root);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if(isset($_POST['create'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    try {
        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

        $pdo->exec($sql);

        echo "New record created successfully";
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

$pdo = null;
?>