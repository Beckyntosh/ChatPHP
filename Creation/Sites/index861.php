<?php
// Database Connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create Table enrolment - if not exists
$sql = "CREATE TABLE IF NOT EXISTS enrolment (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
product_id INT
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Function: Enroll Course by user_id and product_id
function enrollCourse($conn, $user_id, $product_id){
  $sql = "INSERT INTO enrolment (user_id, product_id)
  VALUES ($user_id, $product_id)";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Example: Enroll User 1 in Product A (with product_id = 1)
enrollCourse($conn, 1, 1);

$conn->close();
?>
<html>
  <head>
    <style>
      body {
        background-image: url('beach.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;  
        background-size: cover;
      }
    </style>
  </head>
  <body>
    <h1>Clothing News - Enroll in Course</h1>
Enroll Functionality to be added here
  </body>
</html>
