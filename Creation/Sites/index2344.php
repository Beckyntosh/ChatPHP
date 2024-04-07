<?php
// Set up connection variables
define("DB_SERVER", "db");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_DATABASE", "my_database");

// Try and connect to the database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the table exists, if not create one
$tableCheckQuery = "SHOW TABLES LIKE 'users'";
$result = $conn->query($tableCheckQuery);

if ($result->num_rows == 0) {
    $createQuery = "CREATE TABLE users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        password VARCHAR(32),
        reg_date TIMESTAMP
    )";

    if ($conn->query($createQuery) === TRUE) {
        echo ""; // Table created successfully
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

$message = "";

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = md5($conn->real_escape_string($_POST['password'])); // md5 hash password

    // Insert the user into the database
    $insertQuery = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    
    if ($conn->query($insertQuery) === TRUE) {
        $message = "Registration successful!";
    } else {
        $message = "User could not be registered:" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Signup for Exclusive Member-Only Content</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px #000;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Signup for Exclusive Member-Only Content</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Sign Up">
        </form>
        <?php if ($message != ""): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
    </div>
</body>

</html>

<?php
$conn->close();
?>
