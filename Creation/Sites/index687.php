<?php
$host="db";
$db_user="root";
$db_pass="root";
$db="my_database";
$conn = new mysqli($host,$db_user,$db_pass,$db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql="INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";
    
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
    <title>Heritage Haven - Signup</title>
    <style>
      body{
          font-family: Georgia;
          background-color: #f5f5dc;
      }
      .container{
          width: 400px;
          padding: 16px;
          background-color: white;
          margin: 0 auto;
          margin-top: 50px;
          border: 1px solid black;
      }
      input[type=text],input[type=password]{
          width: 100%;
      }
    </style>
</head>
<body>
    <div class="container">
        <h1>Signup</h1>
        <form action="" method="post">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required><br/>
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required><br/>
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required><br/>
            <input type="submit" value="Signup">
        </form>
    </div>
</body>
</html>