<?php
//connect to database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//create table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS UserProfile (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
favorite_jewelry VARCHAR(50),
newsletter_subscription TINYINT(1),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // echo "Table UserProfile created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

//check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $favorite_jewelry = $_POST['favorite_jewelry'];
    $subscribe = isset($_POST['subscribe']) ? 1 : 0;
    
    //insert data into database
    $sql = "INSERT INTO UserProfile (firstname, lastname, email, favorite_jewelry, newsletter_subscription) VALUES ('$firstname', '$lastname', '$email', '$favorite_jewelry', '$subscribe')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile Setup</title>
    <style>
        body {font-family: Arial, sans-serif; background-color: #f0f0f0;}
        form {max-width: 300px; margin: 20px auto; padding: 20px; background: white; border-radius: 8px;}
        input[type=text], input[type=email] {width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;}
        input[type=checkbox] {margin: 8px 0;}
        input[type=submit] {width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;}
        input[type=submit]:hover {background-color: #45a049;}
    </style>
</head>
<body>

<h2>User Profile Setup</h2>

<form action="" method="post">
    <label for="firstname">First Name:</label>
    <input type="text" id="firstname" name="firstname" required>
    
    <label for="lastname">Last Name:</label>
    <input type="text" id="lastname" name="lastname" required>
  
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
  
    <label for="favorite_jewelry">Favorite Jewelry:</label>
    <input type="text" id="favorite_jewelry" name="favorite_jewelry">
  
    <input type="checkbox" id="subscribe" name="subscribe" value="1">
    <label for="subscribe">Subscribe to newsletter</label><br>
    
    <input type="submit" value="Submit">
</form>

</body>
</html>

<?php
$conn->close();
?>
