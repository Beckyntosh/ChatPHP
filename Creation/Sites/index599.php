<?php
// Connection parameters
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

// Create social media links table if not exists
$sql = "CREATE TABLE IF NOT EXISTS social_media_links (
    id INT AUTO_INCREMENT PRIMARY KEY,
    platform_name VARCHAR(100),
    link VARCHAR(255)
)";
$conn->query($sql);

// Insert social media links (Example)
$sql_social_media = "INSERT INTO social_media_links (platform_name, link) VALUES 
                     ('Facebook', 'https://facebook.com/YOUR_BUSINESS_PAGE'),
                     ('Twitter', 'https://twitter.com/YOUR_BUSINESS_PAGE'),
                     ('Instagram','https://instagram.com/YOUR_BUSINESS_PAGE')
                     ON DUPLICATE KEY UPDATE link=VALUES(link)";

$conn->query($sql_social_media);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sporting Goods Corporate Site</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f2;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .header, .footer {
            background-color: #0a4c3e;
            color: #ffffff;
            text-align: center;
            padding: 1em 0;
        }

        .content {
            padding: 20px;
        }

        .social-media-links > a {
            margin: 0 10px;
            color: #0a4c3e;
            text-decoration: none;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Sporting Goods Business</h1>
    </div>
    <div class="content">
        <h2>Follow Us on Social Media</h2>
        <div class="social-media-links">
            <?php
            $sql = "SELECT * FROM social_media_links";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<a href='".$row["link"]."'>".$row["platform_name"]."</a>";
                }
            } else {
                echo "No social media links found.";
            }
            ?>
        </div>
    </div>
    <div class="footer">
        <p>© 2023 Sporting Goods Business</p>
    </div>
</body>
</html>

<?php
$conn->close();
?>