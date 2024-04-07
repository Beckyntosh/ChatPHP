<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Makeup Webshop</title>
    <style>
        body {background-color: lightblue;}
    </style>
</head>
<body>
    <?php
        $servername = "db";
        $database = "my_database";
        $username = "root";
        $password = "root";
        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $sql = "SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<h1>Welcome to Makeup Webshop</h1>";
            } else {
                echo "Login failed";
            }
        } else {
    ?>
    <form method="post">
        Username:<br>
        <input type="text" name="username">
        <br>
        Password:<br>
        <input type="password" name="password">
        <br><br>
        <input type="submit" value="Submit">
    </form>
    <?php
        }
        $conn->close();
    ?>
</body>
</html>