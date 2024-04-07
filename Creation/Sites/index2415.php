<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['subscribe'])) {

    // Assign MySQL credentials
    $servername = 'db';
    $username = 'root';
    $password = 'root';
    $dbname = 'my_database';

    // Attempt MySQL server connection
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert user into the database
        $sql = "INSERT INTO subscribers (email, signup_date, trial_end_date) VALUES (?, NOW(), DATE_ADD(NOW(), INTERVAL 1 MONTH))";

        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(1, $_POST['email'], PDO::PARAM_STR);

        // Execute the prepared statement
        if($stmt->execute()) {
            echo "<div>Thank you for signing up! Enjoy your 1-month free trial.</div>";
        } else {
            echo "<div>Sorry, there was an error with your signup. Please try again.</div>";
        }

    } catch(PDOException $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }
    
    // Close connection
    unset($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up for Beauty Products Trial</title>
    <style>
        body { font: 14px sans-serif; text-align: center; }
        form { margin-top: 50px; }
        input[type="email"], input[type="submit"] { padding: 10px; }
    </style>
</head>
<body>
    <h2>Sign Up for a 1-Month Free Trial</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="email" name="email" placeholder="Your Email Address" required>
        <input type="submit" name="subscribe" value="Sign Up">
    </form>
</body>
</html>

<?php
// Creating subscribers table if not exists
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $createTableSQL = "CREATE TABLE IF NOT EXISTS subscribers (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(50) NOT NULL,
        signup_date DATETIME NOT NULL,
        trial_end_date DATETIME NOT NULL,
        UNIQUE (email)
    )";

    $conn->exec($createTableSQL);

} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

unset($conn);
?>
