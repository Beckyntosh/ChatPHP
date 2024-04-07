<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = trim($_POST["username"]);
    $inputPassword = trim($_POST["password"]);

    $sql = "SELECT * FROM users WHERE username = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $param_username);
        $param_username = $inputUsername;
        if ($stmt->execute()) {
            $stmt->store_result();
            if($stmt->num_rows == 1){
                $stmt->bind_result($id, $username, $hashed_password);
                if($stmt->fetch()){
                    if(password_verify($inputPassword, $hashed_password)){
                        session_start();
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;
                        header("location: welcome.php");
                    } else{
                        echo "Invalid username or password.";
                    }
                }
            } else{
                echo "Invalid username or password.";
            }
        } else {
            echo "An error occurred. Please try again later."
        }
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body{
            background-color: pink;
            color: red;
            font-family: Arial, sans-serif;
        }
        .container{
            width: 300px;
            padding: 16px;
            background-color: white;
            margin: 0 auto;
            margin-top: 100px;
            border: 1px solid black;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <div>
                <label>Username</label>
                <input type="text" name="username">
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password">
            </div>
            <div>
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
</body>
</html>
