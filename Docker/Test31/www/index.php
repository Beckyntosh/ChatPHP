// PARAMETERS: Function: Volunteer Sign-up Platform for Events and Causes: create an example signup platform for volunteering at events and social causes. Example: User registers to volunteer at a local charity event Product: Home Decor Style: shape shifting
<?php
// Database parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate user input
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $event = trim($_POST["event"]);

    // Insert statement
    $sql = "INSERT INTO volunteers (name, email, event) VALUES (:name, :email, :event)";

    if ($stmt = $pdo->prepare($sql)) {
        // Bind variables
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":event", $event, PDO::PARAM_STR);

        // Attempt to execute
        if ($stmt->execute()) {
            echo "<script>alert('Thank you for signing up as a volunteer!');</script>";
        } else {
            echo "<script>alert('Oops! Something went wrong. Please try again later.');</script>";
        }

        // Close statement
        unset($stmt);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up as Volunteer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="signup-form">
        <h2>Volunteer Sign-Up</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Event</label>
                <select name="event" class="form-control">
                    <option value="Local Charity Event">Local Charity Event</option>
                    <option value="Community Clean-Up">Community Clean-Up</option>
                    <option value="Food Drive">Food Drive</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>
<?php
// Close connection
unset($pdo);
?>
