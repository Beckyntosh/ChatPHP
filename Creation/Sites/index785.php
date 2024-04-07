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

    if($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $qualification = $_POST['qualification'];
      $experience = $_POST['experience'];

      $sql = "INSERT INTO users (name ,email, qualification, experience)
      VALUES ('$name', '$email', '$qualification', '$experience')";

      if ($conn->query($sql) === TRUE) {
        echo "Application submitted successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

    $conn->close();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Online Counseling and Therapy Service - Apply for Job</title>
    <style>
      body {
        background-color: #1b1b2f;
        color: #FFF;
      }

      .form-container {
        background-color: #4b4b7f;
        padding: 2em;
        margin: 2em auto;
        max-width: 500px;
        border-radius: 25px;
      }
    </style>
  </head>
  <body>
    <div class="form-container">
      <h2 style="text-align: center;">Job Application</h2>
      <form method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="qualification">Qualification:</label><br>
        <input type="text" id="qualification" name="qualification"><br>
        <label for="experience">Experience:</label><br>
        <input type="text" id="experience" name="experience"><br><br>
        <input type="submit" value="Apply">
      </form>
    </div>
  </body>
</html>