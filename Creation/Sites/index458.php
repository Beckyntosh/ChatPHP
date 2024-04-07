<?php
// Connect to database
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

// If form is submitted, process the GPA calculation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $grades = $_POST['grades'];
    $credits = $_POST['credits'];
    $totalPoints = 0;
    $totalCredits = 0;
    for ($i = 0; $i < count($grades); $i++) {
        $totalCredits += $credits[$i];
        switch ($grades[$i]) {
            case 'A':
                $totalPoints += $credits[$i] * 4.0;
                break;
            case 'B':
                $totalPoints += $credits[$i] * 3.0;
                break;
            case 'C':
                $totalPoints += $credits[$i] * 2.0;
                break;
            case 'D':
                $totalPoints += $credits[$i] * 1.0;
                break;
            default:
                $totalPoints += 0;
                break;
        }
    }
    $gpa = 0;
    if ($totalCredits > 0) {
        $gpa = $totalPoints / $totalCredits;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>GPA Calculator</title>
    <style>
        .container {
            margin: auto;
            width: 50%;
            padding: 10px;
        }
        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>GPA Calculator</h2>
    <form method="POST">
        <div>
            <label for="grade1">Course 1 Grade (A-D):</label>
            <input type="text" id="grade1" name="grades[]">
            <label for="credit1">Credits:</label>
            <input type="text" id="credit1" name="credits[]">
        </div>
        <div>
            <label for="grade2">Course 2 Grade (A-D):</label>
            <input type="text" id="grade2" name="grades[]">
            <label for="credit2">Credits:</label>
            <input type="text" id="credit2" name="credits[]">
        </div>
        <div>
            <label for="grade3">Course 3 Grade (A-D):</label>
            <input type="text" id="grade3" name="grades[]">
            <label for="credit3">Credits:</label>
            <input type="text" id="credit3" name="credits[]">
        </div>
        <input type="submit" value="Calculate GPA">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<p>Your GPA is: " . number_format($gpa, 2) . "</p>";
    }
    ?>
</div>

</body>
</html>
<?php
$conn->close();
?>