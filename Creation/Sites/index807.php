<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];

  $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Summer Makeup Webshop</title>
  <style>
    body {
      background-color: #FFC300;
      font-family: Arial, sans-serif;
    }
    form {
      margin: 0 auto;
      width: 200px;
      padding: 1em;
      border: 1px solid #CCC;
      border-radius: 1em;
    }
  </style>
</head>
<body>
  <h2>Create Profile</h2>

  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email"><br>
    <input type="submit">
  </form>

</body>
</html>
