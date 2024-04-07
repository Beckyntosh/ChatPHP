<?php
// Database configuration
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

// Create artwork table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS artworks (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(30) NOT NULL,
  artist VARCHAR(30) NOT NULL,
  description TEXT,
  image VARCHAR(100),
  reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST['title'];
  $artist = $_POST['artist'];
  $description = $_POST['description'];
  $imagePath = '';

  // Handle file upload
  if(isset($_FILES['image'])){
    $errors = array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext = strtolower(end(explode('.',$_FILES['image']['name'])));

    $extensions = array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions) === false){
      $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if(empty($errors)==true){
      move_uploaded_file($file_tmp, "uploads/".$file_name);
      $imagePath = "uploads/".$file_name;
    }else{
      print_r($errors);
    }
  }

  // Insert data into database
  $sql = "INSERT INTO artworks (title, artist, description, image)
  VALUES ('$title', '$artist', '$description', '$imagePath')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Art Gallery Entry</title>
</head>
<body>

<form action="" method="post" enctype="multipart/form-data">
  Title: <input type="text" name="title" required><br>
  Artist: <input type="text" name="artist" required><br>
  Description: <textarea name="description" required></textarea><br>
  Image: <input type="file" name="image" required><br>
  <input type="submit" value="Upload Artwork">
</form>

</body>
</html>
