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

// Create table for newsletter signups if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS newsletter_signups (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    token VARCHAR(50) NOT NULL,
    confirmed TINYINT(1) DEFAULT 0,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // echo "Table newsletter_signups created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Function to generate a random token
function generateToken() {
    return bin2hex(random_bytes(25));
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $token = generateToken();

    // Insert into database
    $sql = "INSERT INTO newsletter_signups (email, token) VALUES ('$email', '$token')";

    if ($conn->query($sql) === TRUE) {
        // Send confirmation email
        $to = $email;
        $subject = 'Confirm your Subscription';
        $message = "Please click this link to confirm your subscription: 
        http://yourdomain.com/confirm.php?token=$token";
        $headers = 'From: noreply@yourjewelrywebsite.com' . "\r\n" .
            'Reply-To: noreply@yourjewelrywebsite.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
        echo "Confirmation email sent.";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Newsletter Signup</title>
</head>
<body>
    <h2>Signup for our Newsletter</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Email: <input type="email" name="email">
        <input type="submit" value="Subscribe">
    </form>
</body>
</html>
