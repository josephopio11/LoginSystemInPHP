<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . '/database.php';

    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Home</h1>

    <?php if(isset($user)): ?>

        <p>Hello <?= htmlspecialchars($user["name"])?></p>

        <a href="logout.php">Logout</a>

    <?php else: ?>

        <p>You are not logged in</p>
        
        <a href="login.php">Login</a>
        or
        <a href="signup.html">Register</a>
    <?php endif; ?>
</body>
</html>