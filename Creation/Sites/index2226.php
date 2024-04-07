<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // MySQL credentials
    $servername = "db";
    $username = "root";
    $password = "root";
    $database = "my_database";

    // Connect to MySQL
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    // Create table for users if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    $conn->query($sql);

    // Create table for coupons if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS coupons (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        code VARCHAR(10) NOT NULL,
        discount INT(3) NOT NULL,
        user_id INT(6) UNSIGNED,
        FOREIGN KEY (user_id) REFERENCES users(id)
    )";
    $conn->query($sql);

    // User details
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    // Insert the new user
    $sql = "INSERT INTO users (firstname, lastname, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $firstname, $lastname, $email);
    $stmt->execute();
    
    // Get the last inserted user id
    $last_id = $conn->insert_id;

    // Generate a random coupon code
    $couponCode = substr(md5(uniqid(rand(), true)), 0, 10); // Random code
    $discount = 10; // 10% discount for the sake of simplicity
    
    // Insert the coupon for the new user
    $sql = "INSERT INTO coupons (code, discount, user_id) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $couponCode, $discount, $last_id);
    $stmt->execute();

    echo "Account created successfully! Your coupon code is: " . $couponCode;

    $stmt->close();
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup - Romantic Kitchenware</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffc0cb; /* Light pink background */
            color: #800000; /* Deep maroon text for a 'romantic' feel */
            padding: 20px;
        }
        
        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
        }
        
        input[type=text], input[type=email] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        button {
            background-color: #800000;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <h2>Create your account and receive a gift!</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required>

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <button type="submit">Sign Up & Claim Your Coupon</button>
    </form>
</body>
</html>
