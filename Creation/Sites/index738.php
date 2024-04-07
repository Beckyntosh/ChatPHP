<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT question, option_a, option_b, option_c, option_d, correct_answer FROM quiz";
$result = $conn->query($sql);

echo '<!DOCTYPE html>
<html>
<head>
<title>Adventure Awaits - Quiz</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-image: url("adventure-background.jpg");
    background-size: cover;
    color: white;
}
</style>
</head>
<body>
<h1>Adventure Awaits Quiz</h1>';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<form method="post" action="/submit_quiz.php">
            <h3>'. $row["question"].'</h3>
            <input type="radio" name="answer" value="a">'. $row["option_a"].'<br>
            <input type="radio" name="answer" value="b">'. $row["option_b"].'<br>
            <input type="radio" name="answer" value="c">'. $row["option_c"].'<br>
            <input type="radio" name="answer" value="d">'. $row["$option_d"].'<br>
            <input type="submit" name="submit_answer" value="Submit Answer"></form>';
    }
} else {
    echo "No questions available";
}

$conn->close();

echo '</body>
</html>';
?>