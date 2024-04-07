<?php
// Define database connection variables
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

// Try creating USERS table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql)) {
    echo "Error creating table: " . $conn->error;
}

// Try creating COUPONS table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS coupons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    code VARCHAR(10) NOT NULL,
    discount INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

if (!$conn->query($sql)) {
    echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['email'])) {
    
    // Prepare a select statement to check if user already exists
    $sql = "SELECT id FROM users WHERE email = ?";
    
    if($stmt = $conn->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_email);
        
        // Set parameters
        $param_email = trim($_POST['email']);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            $stmt->store_result();
            
            if($stmt->num_rows == 1){
                echo "This email address is already used.";
            } else{
                // Insert user
                $sql = "INSERT INTO users (email) VALUES (?)";
                
                if($stmt = $conn->prepare($sql)){
                    $stmt->bind_param("s", $param_email);
                    
                    if($stmt->execute()){
                        $last_id = $stmt->insert_id;
                        
                        // Generate Coupon Code
                        $coupon_code = substr(md5(uniqid($param_email, true)), 0, 10);
                        
                        // Insert coupon for user
                        $sql = "INSERT INTO coupons (user_id, code, discount) VALUES (?, ?, 15)";
                        
                        if($stmt = $conn->prepare($sql)){
                            $stmt->bind_param("is", $last_id, $coupon_code);
                            
                            if($stmt->execute()){
                                echo "Congratulations, you've signed up successfully. Your Coupon Code: " . $coupon_code . " Use it to get 15% off your first purchase!";
                            } else{
                                echo "Something went wrong. Please try again later.";
                            }
                        }
                    } else{
                        echo "Something went wrong. Please try again later.";
                    }
                }
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
        
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up and Get a Discount!</title>
</head>
<body>
    <h2>Sign Up for Our Jewelry Website!</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
