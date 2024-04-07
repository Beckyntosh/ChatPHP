<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database configurations
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

    // Create uploads directory if it doesn't exist
    if (!file_exists('uploads')) {
        mkdir('uploads', 0777, true);
    }

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file is a "txt"
    if($fileType != "txt") {
        echo "Sorry, only TXT files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

            // Store file details into the database
            $stmt = $conn->prepare("INSERT INTO uploaded_files (filename, upload_time) VALUES (?, NOW())");
            $stmt->bind_param("s", $filename);

            // Set parameters and execute
            $filename = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
            $stmt->execute();
            $stmt->close();
            // Implement sentiment analysis here or any file content analysis
            // This is a placeholder for where the analysis code would go
            
            echo "File content analysis is under development.";

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    $conn->close(); 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Text File for Analysis</title>
</head>
<body>
    <h2>Upload Document for Sentiment Analysis</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        Select a text file to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Document" name="submit">
    </form>
</body>
</html>

<?php
// Setup and create table if not exists
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

// SQL to create table
$sql = "CREATE TABLE IF NOT EXISTS uploaded_files (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    //echo "Table uploaded_files created successfully";
} else {
    //echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
