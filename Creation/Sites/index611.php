<?php
// Database configuration
$dbHost     = "db"; // Server Name
$dbUsername = "root"; // Username
$dbPassword = "root"; // Password
$dbName     = "my_database"; // Database Name

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Upload Function
if(isset($_POST['upload'])){
    $file_name = $_FILES['file']['name'];
    $temp_name = $_FILES['file']['tmp_name'];

    if($file_name != ""){
        // Location
        $location = "uploads/".$file_name;
        move_uploaded_file($temp_name, $location);
        $query = "INSERT INTO presentations (file_name, location) VALUES ('$file_name', '$location')";
        mysqli_query($db, $query);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <style>
    body {font-family: Arial; color: #333; background-color: #EEE; padding:20px; }
    .section {background-color: #FFF;padding:20px; border-radius:4px; margin-bottom:20px; }
    </style>
</head>
<body>

    <div class="section">
        <h2>Upload Presentation</h2>
        <form method='post' action='' enctype='multipart/form-data'>
            <input type='file' name='file' id='file' >
            <input type='submit' value='Upload' name='upload'>
        </form>
    </div>

    <div class="section">
        <h2>Uploaded Presentations</h2>
        <?php
        $sql = 'SELECT * FROM presentations';
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo 'Presentation Name: ' . $row['file_name'] . '<br>';
                echo 'Location: <a href="'.$row['location'].'">' . $row['location'] . '</a><hr>';
            }
        } else {
            echo 'No presentations uploaded yet.';
        }
        ?>
    </div>

</body>
</html>