

<?php
// Connect to the database
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
$usersTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$loyaltyProgramTable = "CREATE TABLE IF NOT EXISTS loyalty_program (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    points INT(6) DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

$conn->query($usersTable);
$conn->query($loyaltyProgramTable);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $joinLoyaltyProgram = isset($_POST['loyalty']) ? 1 : 0;

    // Insert the user into the database
    $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $firstname, $lastname, $email);
    $stmt->execute();
    $last_id = $stmt->insert_id;

    // If the user opted into the loyalty program, add them
    if ($joinLoyaltyProgram) {
        $stmt = $conn->prepare("INSERT INTO loyalty_program (user_id, points) VALUES (?, 0)");
        $stmt->bind_param("i", $last_id);
        $stmt->execute();
    }

    echo "New records created successfully";
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
</head>
<body>

<h2>Signup Form</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    First Name: <input type="text" name="firstname" required>
    <br><br>
    Last Name: <input type="text" name="lastname" required>
    <br><br>
    Email: <input type="email" name="email" required>
    <br><br>
    <input type="checkbox" name="loyalty" value="1"> Join the Loyalty Program
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>

Please review and customize the code according to your project specifications and security standards. Remember, this example lacks crucial security features like input validation and proper error handling, which are necessary for a real-world application.