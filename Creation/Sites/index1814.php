<?php
// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['textFile'])) {
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

    $fileContent = file_get_contents($_FILES['textFile']['tmp_name']);
    $analysisResult = analyzeSentiment($fileContent);

    $sql = "INSERT INTO SentimentAnalysis (FileName, AnalysisResult, UploadTime)
    VALUES ('" . $conn->real_escape_string($_FILES['textFile']['name']) . "', '" . $conn->real_escape_string($analysisResult) . "', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "File uploaded and analyzed successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// Dummy sentiment analysis function
function analyzeSentiment($text) {
    // This is where you'd integrate an actual sentiment analysis algorithm.
    // For demonstration, we're just returning a dummy value.
    return "Positive";
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Text File for Analysis</title>
    <style>
        body {font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f0f0f0; color: #333;}
        .container {max-width: 700px; margin: auto; background: white; padding: 20px; box-shadow: 0px 0px 10px 0px #000;}
        h2 {text-align: center; color: #666;}
        .upload-btn-wrapper {position: relative; overflow: hidden; display: inline-block;}
        .btn {border: 2px solid gray; color: gray; background-color: white; padding: 8px 20px; border-radius: 8px; font-size: 20px;}
        .btn:hover {background-color: #f1f1f1;}
        .upload-btn-wrapper input[type=file] {font-size: 100px; position: absolute; left: 0; top: 0; opacity: 0;}
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Document for Sentiment Analysis</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="upload-btn-wrapper">
                <button class="btn">Upload a file</button>
                <input type="file" name="textFile" accept=".txt" required>
            </div><br><br>
            <input type="submit" value="Analyze" style="padding: 10px 50px; font-size: 20px;">
        </form>
    </div>
</body>
</html>
