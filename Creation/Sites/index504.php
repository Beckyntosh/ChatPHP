<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            width: 60%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            margin-top: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
        }
        h2 {
            color: #333;
        }
        .upload-form {
            margin-top: 20px;
        }
        .upload-form label {
            display: block;
            margin-bottom: 10px;
        }
        .upload-form input[type="file"] {
            margin-bottom: 20px;
        }
        .upload-form input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        .upload-form input[type="submit"]:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Document for Verification</h2>
        <form class="upload-form" action="" method="post" enctype="multipart/form-data">
            <label for="document">Upload your contract:</label>
            <input type="file" name="document" id="document" required>
            <input type="submit" name="submit" value="Upload Document">
        </form>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["document"])) {
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("CREATE TABLE IF NOT EXISTS documents (id INT AUTO_INCREMENT PRIMARY KEY, filename VARCHAR(255), hash VARCHAR(255))");
        $stmt->execute();

        $fileName = $_FILES["document"]["name"];
        $fileTmpName = $_FILES["document"]["tmp_name"];
        
        $fileHash = hash_file('sha256', $fileTmpName);

        $stmt = $conn->prepare("INSERT INTO documents (filename, hash) VALUES (:filename, :hash)");
        $stmt->bindParam(':filename', $fileName);
        $stmt->bindParam(':hash', $fileHash);
        $stmt->execute();

        echo "<p style='text-align:center;'>Document uploaded successfully for verification.</p>";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>