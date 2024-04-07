<?php
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["audio_file"]) && $_FILES["audio_file"]["error"] == 0){
        $allowed = array("wav" => "audio/wav", "mp3" => "audio/mpeg");
        $filename = $_FILES["audio_file"]["name"];
        $filetype = $_FILES["audio_file"]["type"];
        $filesize = $_FILES["audio_file"]["size"];

        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

        // Verify file size - 10MB maximum
        $maxsize = 10 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("upload/" . $filename)){
                echo $filename . " is already exists.";
            } else{
                move_uploaded_file($_FILES["audio_file"]["tmp_name"], "upload/" . $filename);
                echo "Your file was uploaded successfully.";
                
                //Save file to the database
                $conn = new mysqli("db", "root", "root", "my_database");
                if($conn->connect_error){
                    die("Connection failed: " . $conn->connect_error);
                }
                
                $sql = $conn->prepare("INSERT INTO audio_files (filename, filetype, filesize) VALUES (?, ?, ?)");
                $sql->bind_param("sss", $filename, $filetype, $filesize);
                $sql->execute();
                if ($sql->error) {
                  echo "Error saving to database.";
                } else {
                  echo " Audio file has been successfully saved in the database.";
                }
                $sql->close();
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Audio File for Transcription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            margin: 50px;
        }
        .container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px 0 rgba(0,0,0,0.1);
        }
        .btn-upload {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload an Audio File for Transcription</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Select audio file to upload:</h3>
            <input type="file" name="audio_file" id="audio_file">
            <br><br>
            <input type="submit" value="Upload Audio" name="submit" class="btn-upload">
        </form>
    </div>
</body>
</html>

<?php
// DB setup for audio_files table (Assuming a MySQL database)
// The following SQL statement can be used to create the audio_files table in the my_database database.
/* 
CREATE TABLE `audio_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `filetype` varchar(50) NOT NULL,
  `filesize` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
*/
?>