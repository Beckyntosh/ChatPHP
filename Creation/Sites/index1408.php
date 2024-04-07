<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Habit Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0e8e8;
        }
        .container {
            max-width: 400px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
        }
        h2 {
            text-align: center;
            color: #b284be;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input, button {
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        button {
            background-color: #b284be;
            color: white;
            cursor: pointer;
        }
        button:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daily Water Intake Tracker</h2>
        <form action="" method="post">
            <input type="number" name="liters" placeholder="Liters of water" required step="0.01">
            <input type="date" name="date" required>
            <button type="submit" name="submit">Track It!</button>
        </form>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        // Connection Info
        $servername = "db";
        $username = "root";
        $password = "root";
        $dbname = "my_database";
        
        // Connect to MySQL
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // SQL to create table if not exists
        $sql = "CREATE TABLE IF NOT EXISTS water_intake (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                liters DECIMAL(3,2) NOT NULL,
                date DATE NOT NULL,
                reg_date TIMESTAMP
                )";
                
        if ($conn->query($sql) !== TRUE) {
            echo "Error creating table: " . $conn->error;
        }
        
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO water_intake (liters, date) VALUES (?, ?)");
        $stmt->bind_param("ds", $liters, $date);
        
        // Set parameters and execute
        $liters = $_POST['liters'];
        $date = $_POST['date'];
        $stmt->execute();
        
        echo "<div style='text-align:center; margin-top:20px;'>Entry Added Successfully</div>";
        
        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>
