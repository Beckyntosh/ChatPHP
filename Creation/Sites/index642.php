<!DOCTYPE html>
<html>
<head>
    <title>Celestial Charm - Health and Wellness Video Library</title>
    <style type="text/css">
        body {
            font-family: Arial;
            background: #2c3e50;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #4ca1af, #2c3e50);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #4ca1af, #2c3e50); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            color: white;
        }
    </style>
</head>
<body>
    <?php
        $servername = "db";
        $username = "root";
        $password = "root";
        $dbname = "my_database";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM video_library";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div>";
                echo "<h2>".$row["title"]."</h2>";
                echo "<video width='320' height='240' controls>";
                echo "<source src='videos/".$row["filename"]."' type='video/mp4'>";
                echo "</video>";
                echo "</div>";
            }
        } else {
            echo "No videos found in the library.";
        }

        $conn->close();
    ?>
</body>
</html>
This example assumes you have a table named `video_library` in your database with columns `title` and `filename`. The filename value should be the name of a video file stored in a `videos` folder in the same directory as this PHP file. This script simply connects to the database, retrieves all rows from the `video_library` table, and outputs a video player for each one based on the filename. The videos will play in most modern browsers, assuming they are in a format the browser can handle (e.g. mp4).

As this is a very basic example, it lacks many typical features of a video library site such as user login, video uploading, etc. but it should give a good starting point on how to output videos from a database in PHP.

Please adapt the script according to your specific needs. If your actual database schema or video file setup differs from my assumptions, you will need to make changes accordingly.

Remember you should not put your actual login details in your php file for security reasons. You would normally want to read these from a separate configuration file or an environment variable.