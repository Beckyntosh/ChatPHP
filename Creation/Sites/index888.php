
<!DOCTYPE html>
<html>
<head>
    <title>Multi-functional Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
        }
        .faq-container, .form-container, .video-upload-container, .search-container, .add-container {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], input[type="password"], textarea, input[type="file"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"], button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #007bff;
            color: #ffffff;
        }
        input[type="submit"]:hover, button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<div class="container">

Login Section
    <div class="form-container">
        <h2>Whimsical Wonderland Hair Care Discussion - Login</h2>
        <form method="post" action="">
            Username: <input type="text" name="username" required><br>
            Password: <input type="password" name="password" required><br>
            <button type="submit">Login</button>
        </form>
    </div>

FAQ Section
    <div class="faq-container">
        <h1>FAQ - Online Comic and Graphic Novel Library</h1>
FAQs will be loaded here
    </div>

Search Section
    <div class="search-container">
        <h2>Search Hotels</h2>
        <p>Please enter the hotel name:</p>
        <form action="#">
            <input type="text" name="hotel_name" id="hotel_name">
            <input type="submit" value="Search">
        </form>
Search results will be displayed here
    </div>

Add Section
    <div class="add-container">
        <h2>Followed User's Tickets</h2>
Tickets will be listed here
    </div>

File Upload Section
    <div class="video-upload-container">
        <h2>Upload Video to Stellar Space Tutoring</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="Video title...">
            
            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Write something.." style="height:200px"></textarea>
            
            <input type="file" name="videoToUpload" id="videoToUpload">
            <input type="submit" value="Upload Video" name="submit">
        </form>
    </div>

</div>

</body>
</html>

<?php
// Database connection settings
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Logic for different functionalities like user follow, FAQs rendering, video upload handling etc. goes here

//Close the connection at the end
$conn->close();
?>

