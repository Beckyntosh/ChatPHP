<?php

$host = "db";
$user = "root";
$pass = "root";
$db = "my_database";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK){
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];

    $uploadFileDir = './uploaded_files/';
    $dest_path = $uploadFileDir . $fileName;

    if(move_uploaded_file($fileTmpPath, $dest_path)) {
        $sql = "INSERT INTO users (manual) VALUES ('".$dest_path."')";

        if(mysqli_query($conn, $sql)){
            echo "<h1 style='color:pink;'>File uploaded successfully and record inserted into database.</h1>";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
    else {
        echo "<h1 style='color:pink;'>There was some error moving the file to upload directory.</h1>";
    }
}

?>
<html>
<head>
    <title>File Upload to Database</title>
</head>
<body style="background-color:pink;">
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="file" name="uploadedFile" /><br/>
        <input type="submit" name="uploadBtn" value="Upload" />
    </form>
</body>
</html>
<?php $conn->close(); ?>