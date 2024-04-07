<?php
session_start();

$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection for mysqli
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection for mysqli
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create connection for PDO
$dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8mb4";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $username, $password, $opt);

// Create tables if they don't exist
$createInfluencersTable = "CREATE TABLE IF NOT EXISTS influencers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  description TEXT,
  niche VARCHAR(100),
  followers INT,
  engagement_rate DECIMAL(5, 2)
);";
$conn->query($createInfluencersTable);

$themeTableSql = "CREATE TABLE IF NOT EXISTS themes (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255),
file_path VARCHAR(255)
);";
$conn->query($themeTableSql);

// Function to handle file upload
function uploadTheme($conn) {
    if (isset($_FILES["themeFile"])) {
        $target_dir = "themes/";
        $target_file = $target_dir . basename($_FILES["themeFile"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["themeFile"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "css" ) {
            echo "Sorry, only CSS files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["themeFile"]["tmp_name"], $target_file)) {
                // Save file info in db
                $sql = "INSERT INTO themes (name, file_path) VALUES ('" . basename($_FILES["themeFile"]["name"]) . "', '" . $target_file . "')";
                
                if(mysqli_query($conn, $sql)){
                    echo "The file ". htmlspecialchars(basename($_FILES["themeFile"]["name"])) . " has been uploaded.";
                } else{
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}

$page = isset($_GET['page']) ? $_GET['page'] : '';

switch ($page) {
    case 'apply':
        include('index14.php');
        break;
    case 'signup':
        include('index5.php');
        break;
    case 'login':
        include('index8.php');
        break;
    case 'search':
        include('index55.php');
        break;
    case 'upload':
        uploadTheme($conn);
        include('index34.php');
        break;
    default:
        echo 'Welcome to our site!';
        break;
}

$conn->close();
?>
