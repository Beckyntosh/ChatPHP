<?php
// Connect to the database
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

// Create the tables if they do not exist
$tablesCreationQuery = "CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(50) NOT NULL,
    report_type VARCHAR(50) NOT NULL,
    year YEAR(4) NOT NULL,
    quarter INT(1) NOT NULL,
    content TEXT NOT NULL,
    reg_date TIMESTAMP
);";

if ($conn->query($tablesCreationQuery) !== TRUE) {
    die("Error creating table: " . $conn->error);
}

// Search form
echo '<!DOCTYPE html>
<html>
<head>
    <title>Search Financial Reports</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .search-box { margin: 20px; }
        .search-box input[type="text"] { width: 300px; }
        .report { margin: 20px 0; padding: 10px; background-color: #f0f0f0; }
    </style>
</head>
<body>
    <div class="search-box">
        <form action="" method="get">
            Search for financial reports: 
            <input type="text" name="search" placeholder="Q2 earnings reports for tech companies 2023">
            <input type="submit" value="Search">
        </form>
    </div>';

// Handling search
if (isset($_GET['search'])) {
    $searchTerms = explode(' ', $_GET['search']); // Splitting the search query
    $searchQuery = "SELECT * FROM financial_reports WHERE ";

    // Constructing search query from the search terms
    foreach ($searchTerms as $term) {
        if (!empty($term)) {
            $searchQuery .= "(company_name LIKE '%". $conn->real_escape_string($term) . "%' OR content LIKE '%" . $conn->real_escape_string($term) . "%') AND ";
        }
    }
    
    // Default year and quarter for a given search "Q2 earnings reports for tech companies 2023"
    $searchQuery .= "year = '2023' AND quarter = 2 "; // adjust based on actual search needs
    
    // Removing the last AND
    // $searchQuery = substr($searchQuery, 0, -5); 

    // Running the query
    $result = $conn->query($searchQuery);

    if ($result->num_rows > 0) {
        // Output each report
        while($row = $result->fetch_assoc()) {
            echo "<div class=\"report\"><strong>". $row["company_name"]."</strong><br>Report Type: " . $row["report_type"] . "<br>Year: " . $row["year"] . " - Quarter: " . $row["quarter"] . "<br>" . $row["content"] . "</div>";
        }
    } else {
        echo "0 results found";
    }
}

echo '</body>
</html>';

$conn->close();
?>
