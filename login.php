<?php 
    require 'function.php';
    if(isset($_POST["login"])){
        if($_POST["nim"] === "admin" && $_POST["password"] === "admin"){
            session_start();
            $_SESSION["admin"] = true;
            header("Location: admin.php");
        }
        if(findAccount($_POST)){
            header("Location: menu.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login, Enter you credentials</h1>
    <form action="" method="post">
        <input type="text" name="nim" placeholder="nim"><br>
        <input type="password" name="password" placeholder="password"><br>
        <button type="submit" name="login">Login</button><br>
        <a href="index.php">Create account</a>
    </form>
</body>
</html>