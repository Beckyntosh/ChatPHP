<?php
// Initialize connection variables
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn->connect_error){
    die("ERROR: Could not connect. " . $conn->connect_error);
}

// Create necessary tables if they don't exist
$sql = "CREATE TABLE IF NOT EXISTS Users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    reg_date TIMESTAMP
)";

if (!$conn->query($sql)) {
    die("ERROR: Could not able to execute $sql. " . $conn->error);
}

$sql = "CREATE TABLE IF NOT EXISTS EmailPreferences (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED,
    newsletter BOOLEAN NOT NULL DEFAULT 1,
    product_updates BOOLEAN NOT NULL DEFAULT 1,
    workout_tips BOOLEAN NOT NULL DEFAULT 1,
    FOREIGN KEY(user_id) REFERENCES Users(id)
)";

if (!$conn->query($sql)) {
    die("ERROR: Could not able to execute $sql. " . $conn->error);
}

// Handle form submission
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate email
    if(empty(trim($_POST["email"]))){
        die("Please enter an email.");
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM Users WHERE email = ?";
        
        if($stmt = $conn->prepare($sql)){
            $stmt->bind_param("s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            if($stmt->execute()){
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    // Update user's preferences if the email exists
                    $stmt->bind_result($id);
                    $stmt->fetch();
                    $stmt->close();

                    $update_sql = "REPLACE INTO EmailPreferences (user_id, newsletter, product_updates, workout_tips) VALUES (?, ?, ?, ?)";
                    
                    if($update_stmt = $conn->prepare($update_sql)){
                        $update_stmt->bind_param("iiii", $id, $_POST["newsletter"], $_POST["product_updates"], $_POST["workout_tips"]);
                        
                        if($update_stmt->execute()){
                            echo "Preferences updated successfully.";
                        } else{
                            die("ERROR: Could not execute query: $update_sql. " . $conn->error);
                        }
                        $update_stmt->close();
                    }
                } else {
                    // Insert new user and preferences
                    $stmt->close();
                    $insert_sql = "INSERT INTO Users (email) VALUES (?)";

                    if ($insert_stmt = $conn->prepare($insert_sql)) {
                        $insert_stmt->bind_param("s", $param_email);

                        if($insert_stmt->execute()){
                            $user_id = $conn->insert_id;
                            $insert_stmt->close();

                            $preferences_sql = "INSERT INTO EmailPreferences (user_id, newsletter, product_updates, workout_tips) VALUES (?, ?, ?, ?)";

                            if($preferences_stmt = $conn->prepare($preferences_sql)){
                                $preferences_stmt->bind_param("iiii", $user_id, $_POST["newsletter"], $_POST["product_updates"], $_POST["workout_tips"]);
                                
                                if($preferences_stmt->execute()){
                                    echo "Preferences saved successfully.";
                                }else{
                                    die("ERROR: Could not execute query: $preferences_sql. " . $conn->error);
                                }
                                $preferences_stmt->close();
                            }
                        } else{
                            die("ERROR: Could not execute query: $insert_sql. " . $conn->error);
                        }
                    }
                }
            } else{
                die("ERROR: Could not execute query: $sql. " . $conn->error);
            }
        }
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Email Preferences</title>
</head>
<body>
    <h2>Email Notification Settings</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label><input type="checkbox" name="newsletter" value="1"> Subscribe to Newsletter</label>
        </div>
        <div>
            <label><input type="checkbox" name="product_updates" value="1"> Receive Product Updates</label>
        </div>
        <div>
            <label><input type="checkbox" name="workout_tips" value="1"> Receive Workout Tips</label>
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>
</body>
</html>