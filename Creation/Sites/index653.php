<!DOCTYPE html>
<html>
<head>
   <title>Mountain Majesty: Musical Instruments Online Appointment Booking</title>
   <style>
      body {font-family: Arial, sans-serif;}
      .container {width: 90%; margin: auto; background-color: #d6e9f8; padding: 20px;}
   </style>
</head>
<body>

<div class="container">
<h2>Sign Up to Mountain Majesty</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   Full Name: <input type="text" name="name">
   <br><br>
   E-mail: <input type="text" name="email">
   <br><br>
   Password: <input type="password" name="password">
   <br><br>
   <input type="submit" name="submit" value="Sign up">
</form>
</div>

<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

if (!empty($name) && !empty($email) && !empty($password)) {

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
echo "You have successfully signed up!";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
}
?>

</body>
</html>