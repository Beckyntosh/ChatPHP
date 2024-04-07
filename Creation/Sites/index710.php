<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['avatar'])){
    $avatar = $_FILES['avatar']['tmp_name'];
    $avatar_blob = addslashes(file_get_contents($avatar));
    $user_id = intval($_POST['user_id']);

    $sql = "UPDATE users SET avatar = '{$avatar_blob}' WHERE id = {$user_id}";

    if ($conn->query($sql) === TRUE) {
        echo "Avatar uploaded successfuly";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Skin Care Products Sports Team or League</title>
    <style>
        body{
            background-image: url("images/beach_background.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <label>Choose your avatar: </label>
        <input type="file" name="avatar" required />
        <input type="hidden" name="user_id" value="1" />
        <input type="submit" value="Upload" />
    </form>
</body>
</html>