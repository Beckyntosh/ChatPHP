<?php
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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // The request is using the POST method
        $poll_question = $_POST['poll_question'];
        $poll_option_a = $_POST['poll_option_a'];
        $poll_option_b = $_POST['poll_option_b'];
        
        $sql = "INSERT INTO polls (poll_question, poll_option_a, poll_option_b)
        VALUES ('".$poll_question."', '".$poll_option_a."', '".$poll_option_b."')";

        if ($conn->query($sql) === TRUE) {
            echo "Poll created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Poll</title>
    <style>
        body {background-color: #FFDAB9; font-family: Arial, sans-serif;}
        form {padding: 20px; border-radius: 10px; background-color: #FFF8DC;width: 500px; margin:0 auto; margin-top:100px;}
        input[type=text] {width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;}
        input[type=submit] {width: 100%; background-color: #FF8C00; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;}
        input[type=submit]:hover {background-color: #FF4500;}
    </style>
</head>
<body>
    <form action="" method="post">
        <label for="poll_question">Poll Question:</label><br>
        <input type="text" id="poll_question" name="poll_question" required><br>
        <label for="poll_option_a">Option A:</label><br>
        <input type="text" id="poll_option_a" name="poll_option_a" required><br>
        <label for="poll_option_b">Option B:</label><br>
        <input type="text" id="poll_option_b" name="poll_option_b" required><br>
        <input type="submit" value="Submit">
    </form> 
</body>
</html>

<?php
// Close connection
$conn->close();
?>