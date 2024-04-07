<?php
// Connect to Database
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

// Create table for users if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
trial_start_date DATE NOT NULL,
UNIQUE (email)
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];
    $trialStart = date("Y-m-d"); // Today's date
    $stmt = $conn->prepare("INSERT INTO users (email, trial_start_date) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $trialStart);
    
    if ($stmt->execute()) {
      echo "<p>Thank you for signing up! Enjoy your 1-month free trial.</p>";
    } else {
      if ($conn->errno == 1062) {
        echo "<p>This email is already registered for a trial.</p>";
      } else {
        echo "<p>Error: " . $conn->error . "</p>";
      }
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Art Supplies Subscription Trial Signup</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        form { margin-top: 20px; }
        input[type=email], button { padding: 10px; width: 100%; margin-top: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign up for a Free 1-Month Trial</h2>
        <p>Enjoy premium art supplies delivered to your door.</p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit">Start My Free Trial</button>
        </form>
    </div>
</body>
</html>
