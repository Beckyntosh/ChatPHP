<?php
$host = 'db'; 
$db = 'my_database'; 
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

if(isset($_POST['search'])){
$search = $_POST['search'];

$sql = "SELECT * FROM job_listings 
WHERE job_title LIKE :search OR job_description LIKE :search";
$stmt = $pdo->prepare($sql);
$stmt->execute(['search' => '%'.$search.'%']);
$jobs = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Exotic Escape - Vitamins Blog</title>
    <style>
        body {
            background-color: #f4a261;
            color: #2a9d8f;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Job Listings</h1>
        <form action="" method="POST">
            <input type="text" name="search" required>
            <input type="submit" value="Search">
        </form>
        <hr>
        <?php if(isset($jobs)): ?>
        <?php foreach($jobs as $job): ?>
                <h3><?php echo $job['job_title']; ?></h3>
                <p><?php echo $job['job_description']; ?></p>
                <hr>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>