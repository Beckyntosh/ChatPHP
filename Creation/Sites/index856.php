<?php
// Database configuration
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
$initSql = file_get_contents('init.sql');
$conn->multi_query($initSql);
$conn->close();

session_start();

// Function to handle file uploads
function handleUpload($file, $isSpreadsheet = false) {
    $targetDir = $isSpreadsheet ? "uploads/spreadsheets/" : "uploads/license_files/";
    $targetFile = $targetDir . basename($file["name"]);
    if (move_uploaded_file($file["tmp_name"], $targetFile)) {
        return $targetFile;
    }
    return false;
}

// Function to search courses
function searchCourses($conn, $searchTerm) {
    $sql = "SELECT * FROM courses WHERE title LIKE ? OR description LIKE ?";
    $stmt = $conn->prepare($sql);
    $likeTerm = '%' . $searchTerm . '%';
    $stmt->bind_param('ss', $likeTerm, $likeTerm);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Function to add a bookmark for a user
function addBookmark($conn, $userId, $courseId) {
    $sql = "INSERT INTO bookmarks (user_id, course_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $userId, $courseId);
    return $stmt->execute();
}

// Actions based on request method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['spreadsheet'])) {
        $spreadsheetPath = handleUpload($_FILES['spreadsheet'], true);
    } elseif (isset($_FILES['license_file'])) {
        $licenseFilePath = handleUpload($_FILES['license_file']);
    } elseif (isset($_POST['search_term'])) {
        $courses = searchCourses($conn, $_POST['search_term']);
    } elseif (isset($_POST['bookmark']) && isset($_SESSION['user_id'])) {
        $bookmarkAdded = addBookmark($conn, $_SESSION['user_id'], $_POST['bookmark']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wines Video Sharing</title>
    <style>
        body {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            background-color: #ffdead;
            color: #003366;
        }
        #header {
            background-color: #c9211e;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .btn-upload {
            margin: 10px;
            padding: 5px 20px;
            background-color: #46784f;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-upload:hover {
            background-color: #365940;
        }
        .search-box {
            margin: 10px;
            padding: 5px;
        }
        .search-button {
            padding: 5px 20px;
            background-color: #0d3b66;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .search-button:hover {
            background-color: #0a2c4b;
        }
        .course-list {
            list-style-type: none;
        }
        .course-item {
            background-color: #e0e0e0;
            margin: 5px;
            padding: 5px;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .bookmarked {
            color: green;
        }
    </style>
</head>
<body>
    <div id="header">
        <h1>Wine Video Sharing - Christmas Edition</h1>
    </div>

    <h2>Upload Spreadsheet</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="spreadsheet">
        <input type="submit" class="btn-upload" value="Upload Spreadsheet">
    </form>

    <?php if (isset($spreadsheetPath)): ?>
        <p>Spreadsheet uploaded successfully: <?php echo $spreadsheetPath; ?></p>
    <?php endif; ?>

    <h2>Upload License File</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="license_file">
        <input type="submit" class="btn-upload" value="Upload License File">
    </form>

    <?php if (isset($licenseFilePath)): ?>
        <p>License file uploaded successfully: <?php echo $licenseFilePath; ?></p>
    <?php endif; ?>

    <h2>Search Courses</h2>
    <form action="" method="post">
        <input type="text" name="search_term" class="search-box" placeholder="Enter keyword to search courses...">
        <input type="submit" class="search-button" value="Search">
    </form>

    <?php if (isset($courses)): ?>
        <ul class="course-list">
            <?php foreach ($courses as $course): ?>
                <li class="course-item">
                    <?php echo htmlspecialchars($course['title']); ?>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <form action="" method="post">
                            <input type="hidden" name="bookmark" value="<?php echo $course['id']; ?>">
                            <input type="submit" class="btn-upload bookmarked" value="Bookmark">
                        </form>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>