<?php
// Simple Email Verification Script for a Jewelry Website
// PHP + MySQL + HTML in a single file approach without placeholders

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

// Create tables if not exists
$sqlUserTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
verification_code VARCHAR(50),
is_verified TINYINT(1) DEFAULT 0,
reg_date TIMESTAMP
)";

if (!$conn->query($sqlUserTable) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

$sql = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $verification_code = md5(rand());

    $sql = "INSERT INTO users (username, email, password, verification_code) VALUES ('$username', '$email', '$password', '$verification_code')";

    if ($conn->query($sql) === TRUE) {
        // Send verification email
        $verify_link = "http://".$_SERVER['HTTP_HOST']."/verify.php?code=$verification_code";
        $to      = $email;
        $subject = 'Verify Your Email';
        $message = 'Please click on this link to verify your email: ' . $verify_link;
        $headers = 'From: noreply@yourwebsite.com' . "\r\n" .
                   'Reply-To: noreply@yourwebsite.com' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();
        
        mail($to, $subject, $message, $headers);
        
        echo "Please check your email to verify your account!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup for Jewelry Website</title>
</head>
<body>
    <h2>Signup</h2>
    <form method="post" action="">
        Username: <input type="text" name="username" required><br>
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Signup">
    </form>
</body>
</html>

<?php
$conn->close();
?>
