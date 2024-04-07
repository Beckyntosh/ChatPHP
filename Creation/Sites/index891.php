<!DOCTYPE html>
<html>
<head>
    <title>Comprehensive Website</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; }
        .comment-box { margin-top: 20px; }
        .comment-box textarea { width: 100%; padding: 10px; }
        .comment-box button { padding: 10px 15px; background-color: #4CAF50; color: white; border: none; margin-top: 10px; }
        .comments { margin-top: 20px; }
        .comment { background-color: #f2f2f2; padding: 10px; margin-bottom: 10px; }
        body{
            background-color: pink;
            color: red;
            font-family: Arial, sans-serif;
        }
        .container{
            width: 300px;
            padding: 16px;
            background-color: white;
            margin: 0 auto;
            margin-top: 100px;
            border: 1px solid black;
            border-radius: 4px;
        }
        body {
            font-family: 'GatsbyFLF-Roman';
            background-color: black;
            color: gold;
        }
        h1 {
            text-align: center;
            border-bottom: 2px solid gold;
        }
        table {
            width: 100%;
            text-align: center;
        }
        th, td {
            padding: 15px;
            border-bottom: 1px solid gold;
        }
        body {
            font-family: 'Times New Roman', serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #99a;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #077 3px solid;
        }
        header h1 {
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .search-box {
            text-align: center;
            margin: 20px 0;
        }
        .search-box input[type="text"] {
            width: 300px;
            padding: 10px;
        }
        .search-box input[type="submit"] {
            padding: 10px 20px;
        }
        .video-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .video {
            background: #fff;
            margin: 10px;
            box-shadow: 0 0 5px #aaa;
            padding: 20px;
            width: calc(33.333% - 20px);
            box-sizing: border-box;
        }
        .video h3 {
            margin-top: 0;
        }
        body{
            background: #FFDD97; 
            color: #84656E;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Comments</h2>
        <div class="comment-box">
            <form action="" method="post">
                <textarea name="comment" placeholder="Add a comment..."></textarea>
                <button type="submit" name="submit">Post Comment</button>
            </form>
        </div>
        <div class="comments">
Display comments here
        </div>
    </div>
    <div class="container">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <div>
                <label>Username</label>
                <input type="text" name="username">
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password">
            </div>
            <div>
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
    <h1>Bicycle Portfolio</h1>
    <table>
Contents dynamically populated by PHP
    </table>
    <form method="POST">
        User Id:<br>
        <input type="number" name="user_id"><br>
        Product Id:<br>
        <input type="number" name="product_id"><br>
        Rating:<br>
        <input type="number" name="rating" min="1" max="5"><br>
        Review:<br>
        <textarea name="content" rows="5" cols="40"></textarea><br>
        <input type="submit" value="Submit">
    </form>
    <header>
        <div class="container">
            <h1>Heritage Haven - Clothing News</h1>
        </div>
    </header>
    <div class="container search-box">
        <form action="" method="get">
            <input type="text" name="search" placeholder="Search videos...">
            <input type="submit" value="Search">
        </form>
    </div>
    <div class="container video-list">
Search results will be displayed here
    </div>
    <h2>Sun-Kissed Serenity: Health & Wellness Real Estate</h2>
    <p>Please upload your certificate:</p>
    <form method="post" enctype="multipart/form-data">
        Select certificate to upload:
        <input type="file" name="file" id="file"><br>
        User-ID: <input type="number" name="user_id" id="user_id"><br>
        Product-ID: <input type="number" name="product_id" id="product_id"><br>
        <input type="submit" value="Upload Certificate" name="submit">
    </form>
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
    
    // The PHP code from each section goes here, handling requests and displaying dynamic content
    
    $conn->close();
    ?>
</body>
</html>
