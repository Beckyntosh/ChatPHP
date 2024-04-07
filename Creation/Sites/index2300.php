<?php
// Set up connection parameters
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
$users_table = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(255),
    is_member BOOLEAN DEFAULT FALSE,
    reg_date TIMESTAMP
)";
if ($conn->query($users_table) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

$members_table = "CREATE TABLE IF NOT EXISTS members (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    points INT(6) DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";
if ($conn->query($members_table) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $is_member = isset($_POST['is_member']) ? 1 : 0;

    // Insert the user into the users table
    $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, password, is_member) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $firstname, $lastname, $email, $password, $is_member);
    if(!$stmt->execute()) {
        echo "Error: " . $stmt->error;
    }

    // If opted in for the loyalty program, insert into members table
    if($is_member) {
        $user_id = $stmt->insert_id;
        $stmt = $conn->prepare("INSERT INTO members (user_id, points) VALUES (?, ?)");
        $stmt->bind_param("ii", $user_id, $zero=0);
        if(!$stmt->execute()) {
            echo "Error: " . $stmt->error;
        }
    }
    $stmt->close();
    $conn->close();
    header('Location: thanks.html'); // redirect to a thank you page
    exit();
}

// Close connection in case of early exit
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up | Book Lovers</title>
</head>
<body>

<h2>Signup Form</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="firstname">First Name:</label><br>
    <input type="text" id="firstname" name="firstname" required><br>
    <label for="lastname">Last Name:</label><br>
    <input type="text" id="lastname" name="lastname" required><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br>
    <input type="checkbox" id="is_member" name="is_member">
    <label for="is_member">Sign up for our loyalty program and earn points with every purchase!</label><br><br>
    <input type="submit" value="Submit">
</form> 

</body>
</html>
