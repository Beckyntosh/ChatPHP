<?php
// Establish connection to the database
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS subscribers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // echo "Table subscribers created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = $conn->prepare("INSERT INTO subscribers (email) VALUES (?)");
        $sql->bind_param("s", $email);

        if ($sql->execute()) {
            $message = "You've successfully subscribed for product updates!";
        } else {
            $message = "Error: " . $sql->error;
        }

        $sql->close();
    } else {
        $message = "Invalid Email Address.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up for Product Updates</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0c040;
            text-align: center;
            padding: 50px;
        }
        input[type=email], button {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h2>Welcome to the Happy Shoes Updates Sign Up!</h2>
    <p>Enter your email to stay up to date with our latest shoe releases:</p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="email" name="email" required>
        <button type="submit">Subscribe</button>
    </form>
    
    <?php
    if (!empty($message)) {
        echo "<p>$message</p>";
    }
    ?>
</body>
</html>
