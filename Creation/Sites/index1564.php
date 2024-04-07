<?php

$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userId = $_POST['userId'];
        $role = $_POST['role'];

        $sql = "UPDATE users SET role = :role WHERE id = :userId";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        echo "User role updated successfully!";
    }

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>User Role Management</title>
</head>
<body>
    <h2>User Role Management - Admin Panel</h2>
    <form method="POST">
        <label for="userId">User ID:</label>
        <input type="number" id="userId" name="userId" required>
        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="user">User</option>
            <option value="moderator">Moderator</option>
            <option value="admin">Admin</option>
        </select>
        <button type="submit">Assign Role</button>
    </form>
</body>
</html>
