<?php

// Connection setup
$servername = "db";
$username = "root";
$password = "root";
$db_name = "my_database";

// Building Connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Includes the PHP code for file upload
if(isset($_POST['but_upload'])){
    $name = $_FILES['file']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
 
    // Select file type
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 
    // Valid file extensions
    $extensions_arr = array("xml");
 
    // Check extension
    if(in_array($fileType,$extensions_arr) ){

        // Uploading file
        if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
            // Insert record
            $query = "insert into users(file_name) values('".$name."')";
            mysqli_query($conn,$query);
            echo 'Upload successful.';
        }
    }
}

// HTML part of the code
?>

<!DOCTYPE html>
<html style="background-color:#f0e1cd;">
<head>
    <title>Mediterranean Marvel - Books Forum</title>
</head>
<body style="color:#5b4e49; font-family: 'Pacifico', cursive; text-align: center;">
    <h1>Mediterranean Marvel - Books Forum</h1>
    <form method="post" action="" enctype='multipart/form-data'>
        <input style="margin-top:20px;" type='file' name='file' />
        <input style="margin-top:20px;" type='submit' value='Upload' name='but_upload'>
    </form>
</body>
</html>