<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to database
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
    
    // Check for an uploaded file
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $fileType = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        
        // Verify the file extension
        if (!in_array(strtolower($fileType), $allowed)) {
            echo "Please upload a valid image file (JPG, JPEG, PNG, GIF)";
        } elseif ($_FILES['avatar']['size'] > 500000) { // Check for the size
            echo "Sorry, your file is too large. It must be less than 500kB.";
        } else {
            $avatarContent = mysqli_real_escape_string($conn, file_get_contents($_FILES['avatar']['tmp_name']));
            $sql = "INSERT INTO user_avatars (avatar) VALUES ('$avatarContent')";
            
            if ($conn->query($sql) === TRUE) {
                echo "File uploaded successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "Error uploading file!";
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Funny Kitchenware Avatar Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
        }
        form {
            background-color: #fff;
            margin: auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
            display: inline-block;
        }
        input[type="file"] {
            margin: 10px 0;
        }
        input[type="submit"] {
            background-color: #ff4500;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #e03e00;
        }
    </style>
</head>
<body>
    <h1>Welcome to Funny Kitchenware!</h1>
    <p>Choose your funniest avatar!</p>
    <form method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="avatar" id="avatar">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>
