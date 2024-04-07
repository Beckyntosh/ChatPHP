<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gardening Tools Financial Reports</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e9ecef;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        form {
            margin-bottom: 20px;
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
            background-color: #f7f7f7;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Search for Q2 Earnings Reports for Tech Companies 2023</h1>
        <form action="" method="GET">
            <input type="text" name="search" placeholder="Enter keywords...">
            <button type="submit">Search</button>
        </form>
        <?php
        $servername = "db";
        $username = "root";
        $password = "root";
        $dbname = "my_database";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Create table if not exists
        $sql = "CREATE TABLE IF NOT EXISTS financial_reports (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            company_name VARCHAR(30) NOT NULL,
            report_type VARCHAR(50),
            year YEAR,
            report LONGTEXT,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        if (!$conn->query($sql) === TRUE) {
            echo "Error creating table: " . $conn->error;
        }

        // Insert a sample data
        $sql = "INSERT INTO financial_reports (company_name, report_type, year, report) VALUES ('TechCompany', 'Q2 Earnings', '2023', 'Some lengthy earnings report...')";
        // Check if table is empty and then insert sample data
        $check = $conn->query("SELECT COUNT(*) AS cnt FROM financial_reports");
        $row = $check->fetch_assoc();
        if($row['cnt'] == 0){
            if (!$conn->query($sql) === TRUE) {
                echo "Error inserting data: " . $conn->error;
            }
        }

        // Search functionality
        if (isset($_GET['search'])) {
            $search = $conn->real_escape_string($_GET['search']);

            $sql = "SELECT * FROM financial_reports WHERE CONCAT(company_name, ' ', report_type, ' ', year) LIKE '%$search%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table><tr><th>ID</th><th>Company Name</th><th>Report Type</th><th>Year</th><th>Report</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["id"]."</td><td>".$row["company_name"]."</td><td>".$row["report_type"]."</td><td>".$row["year"]."</td><td>".$row["report"]."</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results found";
            }
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
