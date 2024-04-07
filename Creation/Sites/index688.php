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

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user_id = $_POST['user_id'];
    $avatar = $_FILES['avatar']['name'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    // Check extension
    if(in_array($imageFileType,$extensions_arr) ){
 
        // Convert to base64 
        $image_base64 = base64_encode(file_get_contents($_FILES['avatar']['tmp_name']) );
        $avatar = 'data:image/'.$imageFileType.';base64,'.$image_base64;

        // Insert record
        $query = "update users set avatar='".$avatar."' where id=".$user_id;
        mysqli_query($conn,$query);
  
        // Upload file
        move_uploaded_file($_FILES['avatar']['tmp_name'],$target_dir.$avatar);
    }
}
?>

<!DOCTYPE html>
<html>
<body style="background-color: royalblue; color: gold;">

<h2>Royal Regalia Charity Laptop Donation User Avatar Upload Form</h2>

<form method="post" enctype='multipart/form-data'>
    User ID: <input type="number" name="user_id" min="1" max="100" required><br>
    Select image to upload:
    <input type="file" name="avatar" id="avatar"><br>
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>