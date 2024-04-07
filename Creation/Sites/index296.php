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

// Create table if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS game_saves (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    save_data LONGBLOB NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTable)) {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["savefile"])) {
  $fileName = basename($_FILES["savefile"]["name"]);
  $fileTmpName = $_FILES["savefile"]["tmp_name"];
  if ($fileTmpName != "") {
    $fileData = file_get_contents($fileTmpName);

    $stmt = $conn->prepare("INSERT INTO game_saves (file_name, save_data) VALUES (?, ?)");
    $null = NULL;
    $stmt->bind_param("sb", $fileName, $null);
    $stmt->send_long_data(1, $fileData);

    if ($stmt->execute()) {
      echo "<p>File uploaded successfully.</p>";
    } else {
      echo "<p>File upload failed.</p>";
    }
    $stmt->close();
  } else {
    echo "<p>No file uploaded.</p>";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Save File Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0 auto;
            width: 70%;
            max-width: 800px;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .upload-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 24px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .upload-btn:hover {
            background-color: #45a049;
        }
        input[type="file"] {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Skyrim Save File</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="savefile" required>
            <input type="submit" value="Upload" class="upload-btn">
        </form>
    </div>
</body>
</html>