<?php

// Database connection variables
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

// Create tables if not exists
$codeReviewTable = "CREATE TABLE IF NOT EXISTS code_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    feature_name VARCHAR(255) NOT NULL,
    source_code TEXT NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($codeReviewTable)) {
    echo "Error creating table: " . $conn->error;
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["sourceCode"]) && $_FILES["sourceCode"]["error"] == 0) {
    // Retrieve post variables
    $featureName = $_POST['featureName'];

    // Retrieve uploaded file
    $sourceCode = file_get_contents($_FILES["sourceCode"]["tmp_name"]);

    // Prepare an insert statement
    $stmt = $conn->prepare("INSERT INTO code_reviews (feature_name, source_code) VALUES (?, ?)");
    $stmt->bind_param("ss", $featureName, $sourceCode);

    if ($stmt->execute()) {
        echo "File uploaded successfully";
    } else {
        echo "Error uploading file: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Maternity Wear - Code Review Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f3f3;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        h1 {
            color: #444;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input, textarea {
            margin-bottom: 20px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Upload Code for Review</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="featureName">Feature Name:</label><br>
            <input type="text" id="featureName" name="featureName"><br>

            <label for="sourceCode">Source Code:</label><br>
            <input type="file" id="sourceCode" name="sourceCode"><br>

            <button type="submit">Upload</button>
        </form>
    </div>
</body>
</html>
