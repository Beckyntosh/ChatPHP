<?php
session_start();

// Database configuration
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

// Login processing
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = md5($_POST['password']);

    $sql = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        header("location: welcome.php");
    } else {
        $error = "Your Login Name or Password is invalid";
    }
}

// HTML and PHP mixed for displaying the form and error message
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Personal Blog</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7d7f4; /* Happy themed background */
        }
        .login-container {
            width: 300px;
            padding: 16px;
            background-color: white;
            margin: 50px auto;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type=text], input[type=password] {
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login to Your Blog</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
        </div>
        <button type="submit">Login</button>
        <?php if(isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
    </form>
</div>

</body>
</html>
<?php
$conn->close();
?>
