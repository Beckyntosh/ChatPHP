<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $query = "INSERT INTO users(name, email) VALUES('$name', '$email')";
  if (mysqli_query($conn, $query)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Create Profile for Makeup Webshop</title>
  <style>
    body {
      background-color: #0000FF;
      color: #FFFFFF;
    }
  </style>
</head>
<body>
  <h2>Create Profile</h2>
  <form action = "<?php $_PHP_SELF ?>" method = "POST">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <input type="submit" name="submit" value="Create Profile">
  </form>
</body>
</html>

<?php
$conn->close();
?>
