<?php
// Define MySQL connection parameters
define("MYSQL_USER", "root");
define("MYSQL_PSWD", "root");
define("MYSQL_DB", "my_database");
define("MYSQL_HOST", "db");

// Attempt database connection
try {
    $pdo = new PDO("mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DB, MYSQL_USER, MYSQL_PSWD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Check if Post request is made to register the user
if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['name']) && !empty($_POST['email'])) {
    // Validate received data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    // Prepare an insert statement
    $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
    
    if($stmt = $pdo->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":name", $param_name, PDO::PARAM_STR);
        $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
        
        // Set parameters
        $param_name = $name;
        $param_email = $email;
        
        // Attempt to execute the prepared statement
        if($stmt->execute()) {
            echo "You have registered successfully.";
        } else {
            echo "Something went wrong. Please try again later.";
        }

        // Close statement
        unset($stmt);
    }
    // Close connection
    unset($pdo);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Baby Products Website</title>
</head>
<body>
    <h2>Sign Up</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <input type="submit" value="Sign Up">
        </div>
    </form>
</body>
</html>