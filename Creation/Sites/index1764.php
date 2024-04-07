<?php
// Handle database connection
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS scanned_documents (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    document_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Function to save uploaded file
function saveUploadedFile($userId, $documentName, $conn, &$filePath){
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
    $filePath = $targetFile;
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        // File is valid, and was successfully uploaded.
        // Insert file info into database
        $stmt = $conn->prepare("INSERT INTO scanned_documents (user_id, document_name, file_path) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $userId, $documentName, $filePath);
        $stmt->execute();
        $stmt->close();
        return true;
    } else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assume a user ID for demonstration purposes
    $userId = 1; // This ideally would come from logged in user session
    $documentName = "Driver's License";
    $filePath = "";

    if (saveUploadedFile($userId, $documentName, $conn, $filePath)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }
        input[type="file"] {
            margin-top: 10px;
        }
        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #008cba;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #005f73;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Upload Scanned Document</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        Select document to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Document" name="submit">
    </form>
</div>
</body>
</html>
