<?php
// Set up connection variables
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}

// Check if table exists, if not create it
$tableCheckSql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    trial_start_date DATE,
    trial_end_date DATE
)";

if (!$conn->query($tableCheckSql)) {
    echo "Error creating table: " . $conn->error;
}

// Handle user registration
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate posted values here for simplicity
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT);
    $trialStartDate = date("Y-m-d");
    $trialEndDate = date("Y-m-d", strtotime("+1 month"));

    $insertSql = "INSERT INTO users (username, email, password, trial_start_date, trial_end_date) VALUES (?, ?, ?, ?, ?)";

    if($stmt = $conn->prepare($insertSql)){
        $stmt->bind_param("sssss", $param_username, $param_email, $param_password, $param_trial_start, $param_trial_end);

        // Set parameters and execute
        $param_username = $username;
        $param_email = $email;
        $param_password = $password;
        $param_trial_start = $trialStartDate;
        $param_trial_end = $trialEndDate;

        if($stmt->execute()){
            header("location: welcome.php");
        } else{
            echo "Something went wrong. Please try again later.";
        }

        $stmt->close();
    }
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up for Free Trial</title>
    <style>
        body{ font: 14px sans-serif; text-align: center; }
        .wrapper{ width: 360px; padding: 20px; margin: auto; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up for 1-Month Free Trial</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>Username</label>
                <input type="text" name="username" required>
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <input type="submit" value="Sign Up">
            </div>
        </form>
    </div>
</body>
</html>
