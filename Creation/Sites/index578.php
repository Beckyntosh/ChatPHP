<?php 
// Define connection parameters
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

// Create tables if not exists
$sqlInit = file_get_contents('init.sql');
if (!$conn->multi_query($sqlInit)) {
    echo "Error creating table: " . $conn->error;
}

// Wait for multi queries to finish
do {
    if ($res = $conn->store_result()) {
        $res->free();
    }
} while ($conn->more_results() && $conn->next_result());

// Handle POST request from login form
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql = "SELECT id FROM users WHERE username ='$username' AND password ='$password'";
    $result = $conn->query($sql);

    if($result->num_rows == 1){
        // Successful login
        header("location: welcome.php");
    }else{
        $error = "Your Login Name or Password is invalid";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Skateboards Video Sharing - Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #8FBC8F; /* Forest background color */
            color: white;
        }
        .login-container {
            width: 300px;
            padding: 20px;
            background-color: #556B2F; /* Dark Olive Green */
            margin: 100px auto;
            border-radius: 8px;
            box-shadow: 0 0 10px #000;
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 4px;
        }
        button {
            background-color: #6B8E23; /* Olive Drab */
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 4px;
        }
        button:hover {
            opacity: 0.8;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit" name="login">Login</button>
    </form>
    <?php if(isset($error)) { echo "<div class='error'>".$error."</div>"; } ?>
</div>

</body>
</html>

<?php 
$conn->close();
?>