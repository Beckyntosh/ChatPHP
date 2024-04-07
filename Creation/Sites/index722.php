<?php
$dbhost = 'db';
$dbuser = 'root';
$dbpass = 'root';
$db     = 'my_database';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
if (!$conn) {
    die("connection failure: " . mysqli_connect_error());
}

$html = '';
$message = '';

if (isset($_POST['upload'])) {
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName  = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                $sql = "INSERT INTO products (file_name) VALUES ('$fileNameNew');";
                if(mysqli_query($conn, $sql)){
                    $message = "File Uploaded Successfully.";
                } else {
                    $message = "Failed to upload file." . mysqli_error($conn);
                }
            } else {
                $message = "Your file is too big!";
            }
        } else {
            $message = "There was an error uploading your file!";
        }
    } else {
        $message = "You cannot upload files of this type!";
    }
}

$html .= "<!DOCTYPE html>
<html>
<head>
<title>Makeup Social Networking Site</title>
<style>
body { background: #F2E0D5; font-family: Arial, sans-serif; }
form { margin: 0 auto; width: 30%; }
</style>
</head>
<body>
<h2 style='text-align: center;'>Makeup Social Networking Site - File Upload</h2>
<form action='' method='post' enctype='multipart/form-data'>
<input type='file' name='file'>
<button type='submit' name='upload'>UPLOAD</button>
</form>
<p style='text-align: center;'>$message</p>
</body>
</html>
";

echo $html;

?>