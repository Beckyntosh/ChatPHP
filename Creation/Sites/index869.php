<?php
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Connection to the database
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the users table
$users_table = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
)";

$conn->query($users_table);

// Login functionality
$login_error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if (!empty($username) && !empty($password)) {
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $results = $conn->query($query);
        if ($results->num_rows > 0) {
            echo "Login successful. Welcome " . $username;
        } else {
            $login_error = "Invalid username or password!";
        }
    } else {
        $login_error = "Username and password are required!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
     <style>
        body {font-family: Arial, Helvetica, sans-serif; color: black; background-color: #FF7F50;}
        h2 {margin: 20px 0; color: #2F4F4F;}
        form {border: 3px solid #2F4F4F; width: 30%; margin: auto; padding: 20px;}
        .error {color: red;}
     </style>
</head>
<body>
    <h2>Health and Wellness Products Blog</h2>
    
    <form method="post" action="">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
    
    <p class="error"><?php echo $login_error; ?></p>
</body>
</html>
<?php $conn->close(); ?>
