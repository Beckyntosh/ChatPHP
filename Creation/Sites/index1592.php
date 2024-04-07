<?php
// Define database connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Attempt to connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create artwork table if it doesn't exist
$createTableSql = "CREATE TABLE IF NOT EXISTS artwork (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(50) NOT NULL,
    artwork_title VARCHAR(100) NOT NULL,
    description TEXT,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($createTableSql)) {
    echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $artistName = $_POST['artistName'];
    $artworkTitle = $_POST['artworkTitle'];
    $description = $_POST['description'];

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO artwork (artist_name, artwork_title, description) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $artistName, $artworkTitle, $description);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Art Gallery Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe5ec;
            color: #333;
            padding: 20px;
            max-width: 600px;
            margin: auto;
        }

        input[type=text], textarea {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 2px solid #f08080;
            border-radius: 4px;
        }

        input[type=submit] {
            background-color: #f08080;
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #c06070;
        }

        .container {
            background-color: #fff0f5;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <h2>Online Art Gallery Submission</h2>
    <p>Please fill in the form to submit your artwork.</p>

    <div class="container">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="artistName">Artist Name:</label>
            <input type="text" id="artistName" name="artistName" required>

            <label for="artworkTitle">Artwork Title:</label>
            <input type="text" id="artworkTitle" name="artworkTitle" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>
