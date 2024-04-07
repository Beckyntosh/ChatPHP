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

if(isset($_POST['submit'])){
  $file = $_FILES['file'];

  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('psd');
  
  if(in_array($fileActualExt, $allowed)){
    if($fileError === 0){
      if($fileSize < 1000000){
         $fileNameNew = uniqid('', true).".".$fileActualExt;
         $fileDestination = 'uploads/'.$fileNameNew;
         move_uploaded_file($fileTmpName, $fileDestination);
         
         // sql to insert into database
         $sql = "INSERT INTO products (product_image) VALUES ('{$fileDestination}')";

         if ($conn->query($sql) === TRUE) {
           echo "New record created successfully";
         } else {
           echo "Error: " . $sql . "<br>" . $conn->error;
         }
         
         header("Location: index.php?uploadsuccess");
      } else {
        echo "Your file is too big!";
      }
    } else {
      echo "There was an error uploading your file!";
    }
  } else {
    echo "You cannot upload files of this type!";
  }   
}

$conn->close();
?>

HTML form for uploading file
<html>
<head>
    <title>Classic Charm Makeup Environmental Awareness Site</title>
    <style>
        body {font-family: Arial, sans-serif; background-color: #212023; color: #c6c0bf; text-align: center; padding: 50px;}
        form {background-color: #514d4a; padding: 20px; border-radius: 5px;}
    </style>
</head>
<body>
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit" name="submit">UPLOAD</button>
    </form>
</body>
</html>