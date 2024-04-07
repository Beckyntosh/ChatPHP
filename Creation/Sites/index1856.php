<?php

$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["audio_file"]) && $_FILES["audio_file"]["error"] == 0){
        $allowed = array("mp3" => "audio/mpeg", "wav" => "audio/wav");
        $filename = $_FILES["audio_file"]["name"];
        $filetype = $_FILES["audio_file"]["type"];
        $filesize = $_FILES["audio_file"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MIME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("upload/" . $filename)){
                echo $filename . " is already exists.";
            } else{
                move_uploaded_file($_FILES["audio_file"]["tmp_name"], "upload/" . $filename);
                echo "Your file was uploaded successfully.";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // SQL to insert new record
                $sql = "INSERT INTO transcriptions (filename, filetype, filesize) VALUES ('$filename', '$filetype', '$filesize')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["audio_file"]["error"];
    }
}

?>

<!DOCTYPE html>
<html>
<body>

<h2>Upload a Lecture for Transcription</h2>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select Audio to upload:
    <input type="file" name="audio_file" id="audio_file">
    <input type="submit" value="Upload Audio" name="submit">
</form>

</body>
</html>

<?php

// Create transcription table
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS transcriptions (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
filetype VARCHAR(100) NOT NULL,
filesize INT(10) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table transcriptions created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
