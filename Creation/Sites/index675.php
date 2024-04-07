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

function runQuery($pdo, $sql, $args=NULL)
{
    if (!$args)
     {
         return $pdo->query($sql);
     }
    $stmt = $pdo->prepare($sql);
    $stmt->execute($args);
    return $stmt;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["edit"]))
    {
        $sql = "UPDATE comments SET comment=? WHERE id=?";
        runQuery($pdo, $sql, [ $_POST["comment"], $_POST["id"] ]);
    }
    else
    {
        $sql = "INSERT INTO comments (username, comment) VALUES (?, ?)";
        runQuery($pdo, $sql, [ $_POST["username"], $_POST["comment"] ]);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Spirits Real Estate</title>
</head>
<body style="background-color: #212121; color: #f9a825;">
<h2 style="text-align:center;">Comments</h2>
<form method="post">
    <label>
        Username:
        <input type="text" name="username">
    </label>
    <label>
        Comment:
        <textarea name="comment"></textarea>
    </label>
    <input type="submit" value="Post Comment">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["edit_id"])) {
?>
<form method="post">
    <input type="hidden" name="id" value="<?php echo $_GET["edit_id"]; ?>">
    <label>
        Edit Comment:
        <textarea name="comment"><?php echo $_GET["edit_comment"]; ?></textarea>
    </label>
    <input type="submit" name="edit" value="Save Changes">
</form>
<?php
}
?>

<h3 style="text-align:center;">Comment Listing</h3>
<?php
$sql = "SELECT * FROM comments";
$stmt = runQuery($pdo, $sql);
while ($row = $stmt->fetch())
{
?>
<p>
    <strong><?php echo $row["username"]; ?></strong><br>
    <?php echo $row["comment"]; ?><br>
    <a href="?edit_id=<?php echo $row["id"]; ?>&edit_comment=<?php echo urlencode($row["comment"]); ?>">edit</a>
</p>
<?php
}?>
</body>
</html>