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

//HTML Form for User's Profile Creation
echo '<!DOCTYPE html>
<html>
<style>
body {
  background-color: lightblue;
}
</style>
<body>

<form method="post" action="">
  Username: <input type="text" name="username"><br>
  Password: <input type="password" name="password"><br>
  Email: <input type="email" name="email"><br>
  <input type="submit" value="Create Profile">
</form>

</body>
</html>';

//When form is submitted
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (username, password, email)
    VALUES ('$username', '$password', '$email')";

    if($conn->query($sql) === TRUE){
        echo "New user created successfully";
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
$conn->close();
?>