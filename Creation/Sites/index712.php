<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// File upload path
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

    $sql = "INSERT INTO products (image) VALUES ('$target_file')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully!";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
$conn->close();
?>

<html>
<head>
 <title>Makeup Webshop</title>
 <style>
  body {background-color: pink;}
 </style>
</head>
<body>
  
<form action="" method="post" enctype="multipart/form-data">
 Select image to upload:
 <input type="file" name="fileToUpload" id="fileToUpload">
 <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>