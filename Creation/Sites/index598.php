<?php
$host = 'db';
$user = 'root';
$pass = 'root';
$db= 'my_database';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['update'])){
    
    $UploadFolder = 'uploads';
    $filename = $_FILES['file']['name'];
    $path = $UploadFolder . "/" . $filename;

    move_uploaded_file($_FILES['file']['tmp_name'],$UploadFolder .'/'. $filename);

    $sql = "UPDATE users SET avatar='" . $path . "' WHERE id='1'";

    if ($conn->query($sql) === TRUE) {
        echo "Avatar updated successfully";
    } else {
        echo "Error updating avatar: " . $conn->error;
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laptops Carrier</title>
    <style>
        body{
            background-color:purple;
            color:white;
            font-family: 'Courier New', Courier, monospace;
        }

        .container{
            max-width: 500px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post" enctype="multipart/form-data">
            <h2>Upload Avatar</h2>

            <label>Select Profile Image:</label><br/>
            <input type="file" name="file"><br/><br/>
            <input type="submit" value="Update" name="update">
        </form>
    </div>
</body>
</html>