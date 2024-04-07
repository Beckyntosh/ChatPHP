

<?php
// Set up database connection
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

// Create table if it doesn't exist
$query = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    loyalty_member BOOLEAN NOT NULL DEFAULT FALSE,
    reg_date TIMESTAMP
)";

if (!$conn->query($query) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $loyalty_member = isset($_POST['loyalty']) ? 1 : 0;

    $sql = "INSERT INTO users (firstname, lastname, email, loyalty_member) 
            VALUES ('$firstname', '$lastname', '$email', '$loyalty_member')";
    
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
    <title>Sign up for Loyalty Program</title>
</head>
<body>

<h2>Signup Form</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  First name:<br>
  <input type="text" name="firstname">
  <br>
  Last name:<br>
  <input type="text" name="lastname">
  <br>
  Email:<br>
  <input type="email" name="email">
  <br>
  <input type="checkbox" name="loyalty" value="1"> Sign up for the loyalty program
  <br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>

This basic script:
1. Connects to a MySQL database using provided credentials.
2. Creates a table for storing user registrations if it doesn't already exist.
3. Provides a basic HTML form for user input.
4. Inserts the new user record into the database upon form submission, including whether they opted into the loyalty program.

**Note:** The above example does not include input sanitization or validation, which are crucial for preventing SQL injection and other security vulnerabilities in a production application. Additionally, please ensure you're complying with local laws and regulations regarding data collection and storage, such as GDPR in Europe.