<?php
$host = "db";
$db = "my_database";
$user = "root";
$pass = "root";
$charset = "utf8mb4";

try {
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

$query = file_get_contents("init.sql");
$stmt = $pdo->prepare($query);
if ($stmt->execute())
    echo "Success! Database setup is done!";
else 
    die(print_r($pdo->errorInfo(), true));

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: springgreen;
        }
    </style>
    <title>Upload Plugins</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Please select plugin to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Plugin" name="submit">
    </form>
</body>
</html>

<?php
$target_dir = "plugins/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    if($fileType != "php" ) {
        echo "Sorry, only PHP files are allowed.";
    }
    else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
