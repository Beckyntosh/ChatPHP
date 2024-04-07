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

// Creates a table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
contact_email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Add new client
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Assuming a post request is made to add a new client
  $name = $_POST["name"];
  $contact_email = $_POST["contact_email"];
  
  $stmt = $conn->prepare("INSERT INTO clients (name, contact_email) VALUES (?, ?)");
  $stmt->bind_param("ss", $name, $contact_email);
  
  if($stmt->execute()){
    echo "New client added successfully";
  } else{
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Client</title>
</head>
<body>

<h2>Add a New Client</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="name">Client Name:</label><br>
  <input type="text" id="name" name="name" value=""><br>
  <label for="contact_email">Contact Email:</label><br>
  <input type="text" id="contact_email" name="contact_email" value=""><br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
