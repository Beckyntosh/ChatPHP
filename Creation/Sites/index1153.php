<?php
// This script acts as a simple job search functionality for a school supplies website in a brave style.
// Assuming a MySQL database setup is already in place with the necessary tables.
// MYSQL_ROOT_PSWD: 'root', MYSQL_DB: 'my_database', servername: 'db'

// Set database connection
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

// Handling the search and filter request
$search = isset($_GET['search']) ? $_GET['search'] : '';
$type = isset($_GET['type']) ? $_GET['type'] : '';

$sql = "SELECT * FROM job_positions WHERE position LIKE ? AND (type = ? OR ? = '') AND status = 'active'";
$stmt = $conn->prepare($sql);
$likeSearch = '%' . $search . '%';
$stmt->bind_param("sss", $likeSearch, $type, $type);

$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Job Search - School Supplies Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #333;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #0779e4 3px solid;
        }
        header h1 {
            text-align: center;
            margin: 0;
            padding-bottom: 10px;
        }
        .search {
            text-align: center;
            padding: 20px;
        }
        .jobs {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .job {
            background: #fff;
            margin: 10px;
            padding: 20px;
            width: 30%;
            box-shadow: 0 0 10px 0 rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <header>
        <h1>Job Listings - Find Your Dream Job</h1>
    </header>
    <div class="search">
        <form action="" method="GET">
            <input type="text" name="search" placeholder="Job title, descriptions" value="<?php echo $search; ?>">
            <select name="type">
                <option value="">Any Type</option>
                <option value="remote" <?php echo $type == 'remote' ? 'selected' : ''; ?>>Remote</option>
                <option value="onsite" <?php echo $type == 'onsite' ? 'selected' : ''; ?>>Onsite</option>
            </select>
            <button type="submit">Search</button>
        </form>
    </div>
    <div class="container">
        <div class="jobs">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='job'>";
                    echo "<h3>" . $row["title"] . "</h3>";
                    echo "<p>" . $row["description"] . "</p>";
                    echo "<p><strong>Location: </strong>" . $row["location"] . "</p>";
                    echo "<p><strong>Type: </strong>" . $row["type"] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No job positions found based on your criteria.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
