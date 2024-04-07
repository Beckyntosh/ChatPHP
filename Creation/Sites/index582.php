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

    if (isset($_POST["username"], $_POST["password"], $_POST["2FA_code"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $twoFA = $_POST["2FA_code"];

        $result = $conn->query("SELECT 2FA_code FROM users WHERE username='$username' AND password='$password'");

        if ($result->num_rows === 0) {
            echo "<p style='color:red'>Invalid username or password</p>";
        } else {
            $row = $result->fetch_assoc();
            
            if ($row["2FA_code"] === $twoFA) {
                echo "<h2 style='color:blue'>Authentication Success!</h2>";
            } else {
                echo "<p style='color:red'>Invalid authentication code</p>";
            }
        }
    }

    $conn->close();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Blue Themed Two-factor Authentication</title>
        <style>
            body {
              background-color: #add8e6;
            }
        </style>
    </head>
    <body>
        <h1 style="color:darkblue">Website Login</h1>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
            Username: <input type="text" name="username"><br>
            Password: <input type="password" name="password"><br>
            2FA Code: <input type="text" name="2FA_code"><br>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>