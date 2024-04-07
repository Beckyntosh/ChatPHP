<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database configuration settings
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    // Create database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Create table if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS uploads (
        id INT AUTO_INCREMENT PRIMARY KEY,
        file_name VARCHAR(255) NOT NULL,
        upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if (!$conn->query($sql) === TRUE) {
        echo "Error creating table: " . $conn->error;
    }

    // Process file upload
    if (isset($_FILES["document"]) && $_FILES["document"]["error"] == 0) {
        $allowed = ["pdf" => "application/pdf"]; // Add or remove file types as needed
        $fileName = $_FILES["document"]["name"];
        $fileType = $_FILES["document"]["type"];

        // Verify file extension
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

        // Verify file type
        if (in_array($fileType, $allowed)) {
            // Move the file to the uploads folder
            move_uploaded_file($_FILES["document"]["tmp_name"], "uploads/" . $_FILES["document"]["name"]);
            
            // Insert file info into the database
            $sql = $conn->prepare("INSERT INTO uploads (file_name) VALUES (?)");
            $sql->bind_param("s", $fileName);
            if ($sql->execute()) {
                echo "The file ". htmlentities($fileName). " has been uploaded.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error: There was a problem with your file.";
        }
    } else {
        echo "Error: " . $_FILES["document"]["error"];
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Document for e-Signing</title>
</head>
<body>
    <h2>Upload Legal Document</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        Select document to upload:
        <input type="file" name="document" id="document">
        <input type="submit" value="Upload Document" name="submit">
    </form>
</body>
</html>