<?php
// Checking if a file has been uploaded
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['configFile'])) {
    // Database Configuration
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

    // Process file
    $file = $_FILES['configFile'];
    $fileName = $_FILES['configFile']['name'];
    $fileTmpName = $_FILES['configFile']['tmp_name'];
    $fileSize = $_FILES['configFile']['size'];
    $fileError = $_FILES['configFile']['error'];
    $fileType = $_FILES['configFile']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = ['txt', 'json'];

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 50000) {
                $fileContent = file_get_contents($fileTmpName);

                // Save file information into the database
                $sql = "INSERT INTO file_uploads (file_name, file_size, file_type, content) VALUES (?, ?, ?, ?)";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssss", $fileName, $fileSize, $fileType, $fileContent);

                if ($stmt->execute()) {
                    echo "File uploaded and saved to database successfully.";
                } else {
                    echo "There was an error uploading your file.";
                }
                $stmt->close();
                $conn->close();
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Upload Configuration File</title>
    </head>
    <body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="configFile">
        <button type="submit" name="submit">Upload</button>
    </form>
    </body>
    </html>
    <?php
}
?>