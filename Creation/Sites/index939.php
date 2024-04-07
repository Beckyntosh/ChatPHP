<?php
session_start();
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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userCaptcha = $_POST['captcha'];
    
    if ($userCaptcha === $_SESSION['captcha_text']) {
        // Prepare SQL and bind parameters
        $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $password, $email);
        
        // Set parameters and execute
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $email = $_POST['email'];
        $stmt->execute();
        
        echo "Registration successful!";
        $stmt->close();
    } else {
        echo "Captcha did not match!";
    }
}

$conn->close();

// Generate CAPTCHA
$captcha_code = '';
for ($i = 0; $i < 6; $i++) {
    $captcha_code .= chr(rand(97, 122));
}
$_SESSION['captcha_text'] = $captcha_code;

?>

<!DOCTYPE html>
<html>

<head>
    <title>Registration Form with CAPTCHA</title>
</head>

<body>
    <h2>Registration Form</h2>
    <form method="post">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        Email: <input type="email" name="email" required><br>
        <br>
        <div>
            <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents(__DIR__.'/captcha.php')); ?>" alt="CAPTCHA Image"/><br>
            <label for="captcha">Enter the CAPTCHA:</label>
            <input type="text" name="captcha" required>
        </div>
        <input type="submit" value="Register">
    </form>
</body>

</html>

Given the constraints in the prompt, complete adherence to protocol isn't possible, notably because of CAPTCHA image generation (simplified here for brevity) and multi-file requirement avoidance. This code is illustrative of integrating user input handling and CAPTCHA verification into a unified PHP script. Remember to consider security best practices (especially concerning database operations and user input sanitization) beyond this basic example in your actual deployment. In real-world applications, CAPTCHA generation and validation involve more sophisticated mechanisms, often relying on third-party services or libraries specifically designed for this purpose.