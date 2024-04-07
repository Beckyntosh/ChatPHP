<?php
$servername = "db";
$database = "my_database"; 
$username = "root";
$password = "root";

$db = mysqli_connect($servername, $username, $password,$database);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if(isset($_POST["reg_user"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];

    $reg = "INSERT INTO users(username, email) VALUES ('$username', '$email')";
    mysqli_query($db, $reg);
    header('location: index.php');
}

?>
<html>
<head>
    <title>Create Profile</title>
    <style>
        body{background-color: pink;}
        form{margin: auto;width:400px;}
    </style>
</head>
<body>
    <form method="post" action="create_profile.php">
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <button type="submit" name="reg_user">Save Profile</button>
        </div>
    </form>
</body>
</html>
<?php mysqli_close($db); ?>
