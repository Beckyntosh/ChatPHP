<?php
// An all-in-one PHP script for a user sign-up and appointment booking system
// Note: This is a simplified example and should not be used as-is in a live environment without enhancements 
// in security, error handling, and separation of concerns (front-end vs. back-end, validation, etc.).

// Define MYSQL Connection constants
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt MYSQL server connection
$link = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Create necessary tables if they don't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(40) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
)";

if (!$link->query($sql)) {
    echo "Error creating table: " . $link->error;
}

$sql = "CREATE TABLE IF NOT EXISTS appointments (
    appointment_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    appointment_time DATETIME NOT NULL,
    appointment_type VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

if (!$link->query($sql)) {
    echo "Error creating table: " . $link->error;
}

// Define variables and initialize with empty values
$username = $password = $confirm_password = $email = $appointment_type = $appointment_time = "";
$username_err = $password_err = $email_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = trim($_POST["username"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have at least 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";     
    } else{
        $email = trim($_POST["email"]);
    }
    
    $appointment_type = trim($_POST["appointment_type"]);
    $appointment_time = trim($_POST["appointment_time"]);
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($email_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_email);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_email = $email;
            
            if(mysqli_stmt_execute($stmt)){
                // Get last inserted id to link user with appointment
                $last_id = mysqli_insert_id($link);
                
                $sql = "INSERT INTO appointments (user_id, appointment_time, appointment_type) VALUES (?, ?, ?)";
                if($stmt = mysqli_prepare($link, $sql)){
                    mysqli_stmt_bind_param($stmt, "iss", $last_id, $appointment_time, $appointment_type);
                    if(mysqli_stmt_execute($stmt)){
                        echo "Appointment booked successfully.";
                    } else{
                        echo "Something went wrong. Please try again later.";
                    }
                }
            } else{
                echo "Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Signup</h2>
        <p>Please fill this form to create an account and book an appointment.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>Username</label>
                <input type="text" name="username" class="form-control">
                <span><?php echo $username_err; ?></span>
            </div>    
            <div>
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span><?php echo $password_err; ?></span>
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" class="form-control">
                <span><?php echo $email_err; ?></span>
            </div>
            <div>
                <label>Appointment Type</label>
                <input type="text" name="appointment_type" class="form-control">
            </div>
            <div>
                <label>Appointment Time</label>
                <input type="datetime-local" name="appointment_time" class="form-control">
            </div>
            <div>
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>    
</body>
</html>
