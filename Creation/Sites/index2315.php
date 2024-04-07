<?php
// Establish database connection
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

// Create users table and loyalty program table if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP,
  loyalty_member BOOLEAN DEFAULT FALSE
  )";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS loyalty_program (
  user_id INT(6) UNSIGNED,
  points INT(6) DEFAULT 0,
  FOREIGN KEY (user_id) REFERENCES users(id)
  )";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $loyalty_member = isset($_POST['loyalty_member']) ? 1 : 0;

    // Insert user
    $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, loyalty_member) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $firstname, $lastname, $email, $loyalty_member);
    $stmt->execute();

    $last_id = $stmt->insert_id;

    if ($loyalty_member) {
        // Add to loyalty program
        $stmt = $conn->prepare("INSERT INTO loyalty_program (user_id) VALUES (?)");
        $stmt->bind_param("i", $last_id);
        $stmt->execute();
    }

    echo "New record created successfully";

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup - Loyalty Program</title>
</head>
<body>
<h2>Signup to Smartphones Website</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  First Name: <input type="text" name="firstname" required><br><br>
  Last Name: <input type="text" name="lastname" required><br><br>
  Email: <input type="email" name="email" required><br><br>
  Join Loyalty Program?: <input type="checkbox" name="loyalty_member" value="1"><br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>
