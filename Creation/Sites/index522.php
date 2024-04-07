<?php
session_start();

$MYSQL_HOST = 'db';
$MYSQL_USER = 'root';
$MYSQL_PASSWORD = 'root';
$MYSQL_DATABASE = 'my_database';

// Connect to database
$conn = new mysqli($MYSQL_HOST, $MYSQL_USER, $MYSQL_PASSWORD, $MYSQL_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$create_table = "CREATE TABLE IF NOT EXISTS user_registrations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($create_table)) {
    echo "Error creating table: " . $conn->error;
}

// Generate and save CAPTCHA code in session
if (!isset($_SESSION['captcha'])) {
    $captcha_code = substr(md5(rand()), 0, 6);
    $_SESSION['captcha'] = $captcha_code;
}

// Check form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $user_captcha = trim($_POST['captcha']);
    
    if ($user_captcha === $_SESSION['captcha']) {
        // Insert user data into the database
        $sql = "INSERT INTO user_registrations (username, email) VALUES (?, ?)";
        
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("ss", $username, $email);
            $stmt->execute();
            
            echo "<div>Registration successful!</div>";
        } else {
            echo "<div>Error: " . $conn->error . "</div>";
        }
    } else {
        echo "<div>Invalid CAPTCHA code!</div>";
    }
    
    // Refresh CAPTCHA after form submission
    unset($_SESSION['captcha']);
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Makeup Website Registration</title>
</head>
<body>
    <form action="" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="captcha">Enter CAPTCHA:</label><br>
        <input type="text" id="captcha" name="captcha" required><br>
        <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents('https://via.placeholder.com/150?text='.$_SESSION['captcha']));?>" alt="CAPTCHA" /><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>