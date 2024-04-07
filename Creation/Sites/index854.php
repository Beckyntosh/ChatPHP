<?php
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_POST['reset'])) {
        $user_id = $_POST['user_id'];
        $newPassword = $_POST['new_password'];
        $sql = "UPDATE users SET password ='$newPassword' WHERE id = $user_id ";
        mysqli_query($conn, $sql);
    }

    if(isset($_POST['subscribe'])) {
        $user_id = $_POST['user_id'];
        $ch_id = $_POST['channel_id'];
        $sql = "INSERT INTO channel_subscriptions (user_id, ch_id) VALUES ($user_id, $ch_id)";
        mysqli_query($conn, $sql);
    }

    if(isset($_POST['search'])) {
        $search_term = $_POST['search_term'];
        $sql = "SELECT * FROM patents WHERE description LIKE '%$search_term%'"; 
        $result = mysqli_query($conn, $sql);
    }

    if(isset($_POST['upload']) && isset($_FILES['medical_record'])) {
        $file = $_FILES['medical_record'];
        $fileName = $_FILES['medical_record']['name'];
        $fileTmpName = $_FILES['medical_record']['tmp_name'];
        $fileSize = $_FILES['medical_record']['size'];
        $fileError = $_FILES['medical_record']['error'];
        $fileType = $_FILES['medical_record']['type'];
    
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $fileNameNew = uniqid('', true).".".$fileActualExt;
        $fileDestination = 'uploads/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Herbal Supplements News</title>
        <style>
            body {background-color: #A1C3D1; color: #333;}
        </style>
    </head>
    <body>
        <form method="POST" enctype="multipart/form-data">
            Users ID for Password Reset:<br>
            <input type="number" name="user_id"><br>
            New Password:<br>
            <input type="password" name="new_password"><br>
            <button type="submit" name="reset">Reset Password</button>
            <br><br>
            Users ID for Subscription:<br>
            <input type="number" name="user_id"><br>
            Channel ID for Subscription:<br>
            <input type="number" name="channel_id"><br>
            <button type="submit" name="subscribe">Subscribe</button>
            <br><br>
            Search Term:<br>
            <input type="text" name="search_term"><br>
            <button type="submit" name="search">Search</button>
            <br><br>
            Upload Medical Record:<br>
            <input type="file" name="medical_record"><br>
            <button type="submit" name="upload">Upload</button>
            <br>
        </form>
    </body>
</html>
<?php
    mysqli_close($conn);
?>