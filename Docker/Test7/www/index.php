// PARAMETERS: Function: Search and submit Financial Reports: create an example search feature for financial reports. Example: User searches for 'Q2 earnings reports for tech companies 2023' and submits a report Product: Maternity Wear Style: satisfied
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Reports Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        input[type="text"], button {
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Search Financial Reports</h2>
        <form method="POST">
            <input type="text" name="searchQuery" placeholder="Search for reports..." required>
            <button type="submit" name="submit">Search</button>
        </form>
        <?php
        $servername = "db";
        $username = "root";
        $password = "root";
        $dbname = "my_database";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if(isset($_POST['submit'])) {
                $searchQuery = htmlspecialchars($_POST['searchQuery']);
                
                $stmt = $conn->prepare("SELECT * FROM financial_reports WHERE report_title LIKE :searchQuery AND report_year = 2023");
                $stmt->execute(['searchQuery' => "%$searchQuery%"]);
                
                $results = $stmt->fetchAll();
                
                if($stmt->rowCount() > 0) {
                    echo "<table><tr><th>Report Title</th><th>Company</th><th>Quarter</th><th>Year</th></tr>";
                    foreach ($results as $row) {
                        echo "<tr><td>" . htmlspecialchars($row['report_title']) . "</td><td>" . htmlspecialchars($row['company']) . "</td><td>" . htmlspecialchars($row['quarter']) . "</td><td>" . htmlspecialchars($row['report_year']) . "</td></tr>";
                    }
                    echo "</table>";
                }
                else {
                    echo "<p>No reports found.</p>";
                }
            }
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        ?>
    </div>
</body>
</html>


