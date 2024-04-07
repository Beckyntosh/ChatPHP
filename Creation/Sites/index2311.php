<?php
// Define database connection parameters
$servername = 'db';
$username = 'root';
$password = 'root';
$dbname = 'my_skateboard_website';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for users and loyalty program
$userTableSql = "CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  password VARCHAR(50),
  loyalty_member BOOLEAN DEFAULT false,
  reg_date TIMESTAMP
)";

if ($conn->query($userTableSql) === TRUE) {
  echo "User table created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $loyaltyMember = isset($_POST['loyaltyMember']) ? true : false;
  
  // Insert the user data into database
  $sql = "INSERT INTO users (firstname, lastname, email, password, loyalty_member) VALUES (?, ?, ?, ?, ?)";

  // Prepare statement
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssssb", $firstname, $lastname, $email, $password, $loyaltyMember);
  
  // execute and close statement
  if($stmt->execute()) {
    echo "<div>Registration successful!</div>";
  } else {
    echo "<div>Error: " . $sql . "<br>" . $conn->error . "</div>";
  }
  $stmt->close();
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Skateboards Loyalty Program Sign-up</title>
</head>
<body>
    <h2>Skateboard Website Registration</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="firstname">First Name:</label><br>
        <input type="text" id="firstname" name="firstname" required><br>
        <label for="lastname">Last Name:</label><br>
        <input type="text" id="lastname" name="lastname" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="checkbox" id="loyaltyMember" name="loyaltyMember">
        <label for="loyaltyMember">Join Loyalty Program</label><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
