<?php
// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to the database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if email is set
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Check if email exists in the database
    $sql = "SELECT id, username, email FROM users WHERE email = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $param_email);
        $param_email = $email;

        // Execute the statement
        if ($stmt->execute()) {
            $stmt->store_result();

            // Check if email exists, if yes then send reset password link
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($id, $username, $email);
                $stmt->fetch();

                // TODO: Send email with reset password link (Not implemented)
                // Example: mail($email, "Reset Password", "Link to reset password");
                echo "Reset password link has been sent to your email.";
            } else {
                echo "No account found with that email address.";
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            text-align: center;
        }
        .container {
            margin-top: 50px;
        }
        input[type="email"], input[type="submit"] {
            padding: 10px;
            margin: 10px;
            border: 1px solid #aaa;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #3333ff;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #5555ff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="email" name="email" placeholder="Enter your email" required>
            <input type="submit" value="Reset Password">
        </form>
    </div>
</body>
</html>
