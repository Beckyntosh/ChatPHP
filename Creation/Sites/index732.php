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

// Search
$searchTerm = isset($_POST['search']) ? $_POST['search'] : '';

// Select
$sql = "SELECT * FROM products WHERE faq LIKE '%{$searchTerm}%' ";
$result = $conn->query($sql);

// Style
echo "
<style>
body {background-color: #f9f9f9; color: #333;}
h2 {font-family: 'Arial', sans-serif; font-size: 22px; color: #009}
table {border-collapse: collapse; width: 100%;}
td, th {border: 1px solid #ddd; padding: 8px;}
tr:nth-child(even){background-color: #f2f2f2;}
tr:hover {background-color: #ddd;}
th {padding-top: 12px;  padding-bottom: 12px;  text-align: left;  background-color: #4CAF50; color: white;}
</style>
";

// Form
echo "<form method='POST'>";
echo "<input type='text' name='search' value='{$searchTerm}' />";
echo "<button type='submit'>Search</button>";
echo "</form>";

if ($result->num_rows > 0) {
    echo "<h2>Search Results:</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Description</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["description"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>