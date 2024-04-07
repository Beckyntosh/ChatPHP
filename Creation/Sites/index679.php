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

// Variables
$name = $_POST["name"];
$description = $_POST["description"];
$dueDate = $_POST["due_date"];
$completed = $_POST["completed"];

// Insert data
$sql = "INSERT INTO tasks (name, description, dueDate, completed)
VALUES ('$name', '$description', '$dueDate', '$completed')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
  <style>
    body {
      background-color: pink;
    }
  </style>
</head>

<body>

<form action="" method="post">
  Name: <input type="text" name="name"><br>
  Description: <input type="text" name="description"><br>
  Due Date: <input type="date" name="due_date"><br>
  Completed: <input type="checkbox" name="completed" value="true"><br>
  <input type="submit">
</form>

</body>
</html>