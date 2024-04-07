<?php
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['upload'])) {

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "<p class='red'>File is not an image.</p>";
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            echo "<p class='red'>Sorry, file already exists.</p>";
            $uploadOk = 0;
        }

        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "<p class='red'>Sorry, your file is too large.</p>";
            $uploadOk = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "<p class='red'>Only JPG, JPEG, PNG & GIF files are allowed.</p>";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "<p class='red'>Sorry, your file was not uploaded.</p>";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $sql = "INSERT INTO products (img_url) VALUES ('".$target_file."')";
                $conn->query($sql);
                echo "<p class='red'>The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.</p>";
            } else {
                echo "<p class='red'>Sorry, there was an error uploading your file.</p>";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Makeup Webshop</title>
    <style>
    .red {
        color: red;
		padding: 5px;
    }
    </style>
</head>
<body style="background-color: red;">
    <form method="post" enctype="multipart/form-data">
        Select image to upload:<br>
        <input type="file" name="fileToUpload" id="fileToUpload"><br>
        <input type="submit" value="Upload Image" name="upload">
    </form>
</body>
</html>
<?php
    $conn->close();
?>