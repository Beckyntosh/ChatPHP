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

// Create Influencers table if it doesn't exist
$createInfluencersTable = "CREATE TABLE IF NOT EXISTS influencers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  description TEXT,
  niche VARCHAR(100),
  followers INT,
  engagement_rate DECIMAL(5, 2)
);";

if ($conn->query($createInfluencersTable) === TRUE) {
  echo "Table influencers created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// HTML and PHP for Search functionality
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quaint Quarters - Find Your Influencer</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f2ef;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1, h2 {
            color: #556b2f;
        }
        .search-box {
            margin-bottom: 20px;
        }
        .search-box input[type=text] {
            padding: 10px;
            width: calc(100% - 22px);
            border: 1px solid #ddd;
        }
        .search-box input[type=submit] {
            padding: 10px 20px;
            background-color: #556b2f;
            border: none;
            color: white;
            cursor: pointer;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #556b2f;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Quaint Quarters</h1>
    <h2>Search for Influencers</h2>
    <div class="search-box">
        <form action="" method="POST">
            <input type="text" name="search" placeholder="Enter niche or name...">
            <input type="submit" value="Search">
        </form>
    </div>

    <?php
    if (isset($_POST['search'])) {
        $search = $conn->real_escape_string($_POST['search']);
        $sqlSearch = "SELECT * FROM influencers WHERE name LIKE '%$search%' OR niche LIKE '%$search%'";
        $result = $conn->query($sqlSearch);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>Name</th><th>Description</th><th>Niche</th><th>Followers</th><th>Engagement Rate</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["name"] . "</td><td>" . $row["description"] . "</td><td>" . $row["niche"] . "</td><td>" . $row["followers"] . "</td><td>" . $row["engagement_rate"] . "%</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results found";
        }
    }
    ?>
</div>
</body>
</html>
<?php
$conn->close();
?>