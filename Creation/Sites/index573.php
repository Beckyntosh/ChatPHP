<?php
$db_username = 'root';
$db_password = 'root';
$db_name = 'my_database';
$db_host = 'db';

$conn = new mysqli($db_host, $db_username, $db_password,$db_name);

if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
    exit();
}

$message = mysqli_real_escape_string($conn, $_POST['message']);
$receiverId = mysqli_real_escape_string($conn, $_POST['receiverId']);
$senderId = $_SESSION['userId'];

if ($message && $receiverId) {
    $query = "INSERT INTO users (`message`, `receiver_id`, `sender_id`) VALUES ('$message', '$receiverId', '$senderId')";
    if ($conn->query($query) === TRUE) {
        echo "Message sent successfully";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

$conn->close();
?>