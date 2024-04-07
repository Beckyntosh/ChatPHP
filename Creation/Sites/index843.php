<html>
  <head> 
    <style>
      body{
        background-color:#aff0b2;
        color:#333;
      }
    </style>
  </head>
  <body>
    <form method="post">
      Full Name:<br>
      <input type="text" name="name" required><br>
      Email:<br>
      <input type="email" name="email" required><br>
      Street Address:<br>
      <input type="text" name="address" required><br>
      Phone:<br>
      <input type="tel" name="phone" required><br>
      <input type="submit" name="save" value="Save Contact">
    </form>
  </body>
</html>

<?php
    if(isset($_POST['save'])){
        $servername = 'db';
        $username = 'root';
        $password = 'root';
        $dbname = 'my_database';

        // Create Connection
        $conn = new mysqli($servername, $username, $password, $dbname);
      
        // Check Connection
        if($conn->connect_error){
            die("Connection Failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO users (name, email, address, phone) VALUES ('".$_POST["name"]."','".$_POST["email"]."','".$_POST["address"]."','".$_POST["phone"]."')";

        if($conn->query($sql) === TRUE){
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }

?>