<?php 
    session_start();
    if(!isset($_SESSION["nim"])){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>
<body>
    <h1>This is menu</h1>
    <h3><?= $_SESSION["nama"]?></h3>
    <h3><?= $_SESSION["nim"]?></h3>
    <a href="logout.php">Logout</a>
</body>
</html>