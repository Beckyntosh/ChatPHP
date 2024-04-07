<?php
// Initialize variables for database connection
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

// Create tables if they do not exist
$sql = "CREATE TABLE IF NOT EXISTS clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // echo "Table Clients created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS interaction_logs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
client_id INT(6) UNSIGNED,
interaction_detail TEXT NOT NULL,
interaction_date TIMESTAMP,
FOREIGN KEY (client_id) REFERENCES clients(id)
)";

if ($conn->query($sql) === TRUE) {
  // echo "Table Interaction_logs created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  
  // Escape user inputs for security
  $firstname = $conn->real_escape_string($firstname);
  $lastname = $conn->real_escape_string($lastname);
  $email = $conn->real_escape_string($email);

  // attempt insert query execution
  $sql = "INSERT INTO clients (firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email')";
  
  if ($conn->query($sql) === TRUE) {
    echo "<p class='success'>New record created successfully</p>";
  } else {
    echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Client to CRM System</title>
<style>
  body { font-family: Arial, sans-serif; }
  .container { max-width: 600px; margin: auto; padding: 20px; }
  .success { color: green; }
  .error { color: red; }
</style>
</head>
<body>
<div class="container">
  <h2>Add a New Client</h2>
  <form action="" method="post">
    <label for="firstname">First Name:</label><br>
    <input type="text" id="firstname" name="firstname" required><br>
    <label for="lastname">Last Name:</label><br>
    <input type="text" id="lastname" name="lastname" required><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br><br>
    <input type="submit" value="Submit">
  </form>
</div>
</body>
</html>
<?php
$conn->close();
?>