<?php

$dbServername = "db";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "my_database";

// Creating the connection
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(mysqli_connect_errno()){
    echo 'Failed to connect to database: '.mysqli_connect_error();
    die();
}
?>

<html>
  <head>
    <title>Tropical Paradise Art Supplies Event Planning and Management</title>
    <style>
      body{
        background-color: orange;
        font-family: Arial, sans-serif;
      }
      form{
        background-color: #fff;
        padding: 10px;
        margin: 20px auto;
        width: 300px;
        border-radius: 15px;
      }
    </style>
  </head>
  <body>
    <form action="" method="POST">
      <label for="username">Username:</label><br>
      <input type="text" id="username" name="username"><br>
      <label for="event">Event:</label><br>
      <input type="text" id="event" name="event"><br>
      <label for="review">Review:</label><br>
      <textarea id="review" name="review"></textarea><br>
      <input type="submit" value="Submit" name="submit_review">
    </form>
  </body>
</html>

<?php
   
if(isset($_POST['submit_review'])){
    $username = $_POST['username'];
    $event = $_POST['event'];
    $review = $_POST['review'];
    
     
    $sql = "INSERT INTO users (username) VALUES ('$username')";
    $sql2 = "INSERT INTO products (product_name, review) VALUES ('$event', '$review')";
    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql2);
}

?>