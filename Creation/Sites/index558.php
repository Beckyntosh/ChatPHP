<?php
// Configuration for database connection
$host       = "db";
$username   = "root";
$password   = "root";
$dbname     = "my_database";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );

// HTML structure for whimsical wonderland theme
echo '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Kitchenware Music Streaming</title>';
echo '<style>body { background-color: #f0e4d7; font-family: "Comic Sans MS", cursive, sans-serif; color: #3b003b; } .wrapper { width: 350px; padding: 20px; margin: 50px auto; background-color: #fef5e7; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); } form { display: flex; flex-direction: column; } input[type=text], input[type=password] { margin: 10px 0; padding: 10px; border-radius: 5px; border: 1px solid #ddd; } input[type=submit] { background-color: #d390b6; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer; } input[type=submit]:hover { background-color: #ba7ca8; }</style></head><body>';
echo '<div class="wrapper">';
echo '<h2>Login to Kitchenware Music Streaming</h2>';
echo '<form action="" method="post">';
echo '<label for="username">Username:</label>';
echo '<input type="text" name="username" required>';
echo '<label for="password">Password:</label>';
echo '<input type="password" name="password" required>';
echo '<input type="submit" name="login" value="Login">';
echo '</form>';
echo '</div></body></html>';

session_start();

// Function to open connection to the database
function openConnection() {
    global $dsn, $username, $password, $options;
    try {
        return new PDO($dsn, $username, $password, $options);
    } catch (PDOException $e) {
        echo "Database connection failed: " . $e->getMessage();
        exit;
    }
}

// Function to check user login
function checkLogin($username, $password) {
    $conn = openConnection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && $user['password'] === $password) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: welcome.php"); // Redirect to a welcome page (not implemented in this code snippet)
        exit;
    } else {
        echo '<p style="color: red;">Invalid username or password</p>';
    }
}

// Handling form submission
if(isset($_POST['login'])) {
    $usernameInput = $_POST['username'];
    $passwordInput = $_POST['password'];
    checkLogin($usernameInput, $passwordInput);
}