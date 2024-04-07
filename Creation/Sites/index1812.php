<?php
// Database connection
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

// Create table for uploads if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS text_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

function analyzeText($text) {
    // Dummy analysis function for sentiment - to be developed further
    $positiveWords = ['excellent', 'happy', 'positive', 'love'];
    $negativeWords = ['bad', 'sad', 'negative', 'hate'];
    $positives = 0;
    $negatives = 0;

    $words = explode(' ', $text);
    
    foreach ($words as $word) {
        if (in_array(strtolower($word), $positiveWords)) {
            $positives++;
        } elseif (in_array(strtolower($word), $negativeWords)) {
            $negatives++;
        }
    }

    return $positives > $negatives ? 'Positive' : ($negatives > $positives ? 'Negative' : 'Neutral');
}

// File upload logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["textFile"])) {
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["textFile"]["name"]);
    $textFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file is a text file
    if($textFileType != "txt") {
        echo "Only TXT files are allowed.";
    } else {
        if (move_uploaded_file($_FILES["textFile"]["tmp_name"], $targetFile)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["textFile"]["name"])). " has been uploaded.";

            // Read file and analyze content
            $content = file_get_contents($targetFile);
            $analysisResult = analyzeText($content);

            // Save file information in the database
            $stmt = $conn->prepare("INSERT INTO text_uploads (file_name, file_path) VALUES (?, ?)");
            $stmt->bind_param("ss", $_FILES["textFile"]["name"], $targetFile);
            $stmt->execute();

            echo " Sentiment Analysis Result: " . $analysisResult;
        } else {
            echo "There was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Text for Analysis</title>
</head>
<body>
    <h2>Text File Upload for Content Analysis</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="file">Upload a text file for sentiment analysis:</label><br>
        <input type="file" name="textFile" id="file"><br><br>
        <input type="submit" value="Upload and Analyze">
    </form>
</body>
</html>
<?php
$conn->close();
?>
