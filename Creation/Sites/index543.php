<?php

$host = 'db';
$db   = 'my_database';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

function blockUser($user_id){
    global $pdo;
    $query = $pdo->prepare("UPDATE users SET status='blocked' WHERE id=:user_id");
    $query->execute(['user_id' => $user_id]);
}

function reportUser($user_id, $report_message){
    global $pdo;
    $query = $pdo->prepare("INSERT INTO reports (user_id, message) VALUES (:user_id, :report_message)");
    $query->execute(['user_id'=>$user_id , 'report_message'=>$report_message]);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Baby Product Charity</title>
    <style type="text/css">
        body {
            background-color: #F8D7DA;
        }
        .button {
            background-color: #F50057; 
            color: white; 
        }
    </style>
</head>
<body>
<?php

if(isset($_POST['user_id']) && isset($_POST['action'])){
    $user_id = $_POST['user_id'];
    if($_POST['action'] === "block"){
        blockUser($user_id);
        echo "User Blocked Successfully";
    }elseif($_POST['action'] === "report"){
        $report_message = $_POST['report_message'];
        reportUser($user_id, $report_message);
        echo "User Reported Successfully";
    }
}

?>

<form method="post" action="">
    User Id: <input type="number" name="user_id"><br>
    Action: <select name="action">
        <option value="block">Block</option>
        <option value="report">Report</option>
    </select><br>
    Report Message: <textarea name="report_message"></textarea><br>
    <input type="submit" value="Submit" class="button">
</form>

</body>
</html>