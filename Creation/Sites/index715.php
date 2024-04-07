<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $stmt = $conn->prepare("INSERT INTO users (name, email, event) VALUES (:name, :email, :event)");

      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':event', $event);

      $name = $_POST["name"];
      $email = $_POST["email"];
      $event = $_POST["event"];
      $stmt->execute();
      
      echo "New record created successfully";
    } 
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;
?>

<!DOCTYPE html>
<html>
<head>
  <title>Enchanted Elegance - Event Registration</title>
Add your own CSS file here
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h2>Event Registration</h2>
  <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    Name: <input type="text" name="name"><br>
    E-mail: <input type="text" name="email"><br>
    Event: <input type="text" name="event"><br>
    <input type="submit">
  </form>
</body>
</html>