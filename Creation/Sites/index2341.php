<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connection info
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
    
    // Sanitize and validate user inputs
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST["password"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($password)) {
        echo "Invalid input.";
    } else {
        // Check if email already exists
        $sql = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $sql->bind_param("s", $email);
        $sql->execute();
        $sql->store_result();
        
        if ($sql->num_rows > 0) {
            echo "Email already exists.";
        } else {
            // Insert new user
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $insert = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
            $insert->bind_param("ss", $email, $hashed_password);
            
            if ($insert->execute()) {
                echo "Signup successful. You can now access exclusive member-only content.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        $sql->close();
        $insert->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup for Exclusive Content</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0ead6; color: #333; text-align: center; }
        form { margin: 0 auto; width: 300px; padding: 20px; background-color: #fff; border: 1px solid #ccc; }
        input[type="email"], input[type="password"] { width: 94%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; }
        input[type="submit"] { background-color: #8aad88; color: #fff; padding: 10px; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Signup for Access to Exclusive Member-Only Content</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="email" name="email" placeholder="Enter your email" required>
        <input type="password" name="password" placeholder="Create a password" required>
        <input type="submit" value="Signup">
    </form>
</body>
</html>
