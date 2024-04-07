<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Sanitize and prepare data
    $email = $conn->real_escape_string($_POST['email']);
    $name = $conn->real_escape_string($_POST['name']);
    $trial_start = date("Y-m-d");
    $trial_end = date("Y-m-d", strtotime("+1 month"));

    // Insert user into table
    $stmt = $conn->prepare("INSERT INTO users (name, email, trial_start, trial_end) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $trial_start, $trial_end);

    if ($stmt->execute()) {
        echo "<p>Signup successful. Enjoy your 1-month free trial!</p>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grateful Watches - Free Trial Signup</title>
    <style>
        body { font-family: 'Arial', sans-serif; background-color: #eaeaea; padding: 50px; }
        form { max-width: 400px; margin: 0 auto; padding: 1em; background: #fff; border-radius: 10px; }
        h2 { text-align: center; }
        label, input { display: block; margin: 0.5em 0; }
        input[type="text"], input[type="email"] { width: 100%; }
        input[type="submit"] { font-size: 16px; padding: 10px; background-color: #555; color: white; border: none; border-radius: 5px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #333; }
    </style>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>Grateful Watches Trial Signup</h2>
        <label for="name">Name:</label><input type="text" id="name" name="name" required>
        <label for="email">Email:</label><input type="email" id="email" name="email" required>
        <input type="submit" value="Sign Up">
    </form>
</body>
</html>

<?php
// PHP part for creating the initial 'users' table if not exists. This should ideally be separate from the main script for security and maintainability.
$dbhost = 'db';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'my_database';
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die('Could not connect: ' . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    trial_start DATE NOT NULL,
    trial_end DATE NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
