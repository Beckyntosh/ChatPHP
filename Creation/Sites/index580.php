<?php

$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database"; 

$conn = new mysqli($servername, $username, $password, $dbname); 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['change'])){

    $username = $_POST['username'];
    $oldpassword = $_.POST['oldpassword'];
    $newpassword = $_POST['newpassword'];
    
    $result = $conn->query("SELECT password FROM users WHERE username = '$username'");

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if($oldpassword == $row['password']){

            $update = $conn->query("UPDATE users SET password = '$newpassword' WHERE username = '$username'");

            if($update){
                echo "Password changed successfully!";
            } else {
                echo "Failed to change password!";
            }

        } else {
            echo "Old password is incorrect!";
        }
    }

    $conn->close();

}

?>

<!DOCTYPE html>
<html>
<head>
  <style>
    body {
        font-family: Arial, sans-serif;
        padding: 10px;
        background-color: #f1f1f1;
    }
    form {
        border: 2px solid #ccc;
        padding: 20px;
        background-color: #fff;
    }
    input[type=text], input[type=password]{
        padding: 12px;
        width: 100%;
    }
    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 10px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }
  </style>
</head>

<body>

<form method="post" action="">
  <label>Username:</label><br>
  <input type="text" name="username" required><br>
  <label>Old Password:</label><br>
  <input type="password" name="oldpassword" required><br>
  <label>New Password:</label><br>
  <input type="password" name="newpassword" required><br>
  <input type="submit" name="change" value="Change Password">
</form>

</body>

</html>