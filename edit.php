<?php 
    require 'function.php';
    session_start();
    if(!isset($_SESSION["admin"])){
        header("Location: login.php");
    }
    $idq = $_GET["id"];
    $mahasiswa = findOne("SELECT * FROM mahasiswa WHERE id = '$idq'");
    if(isset($_POST["update"])){
        $nama = $_POST["nama"];
        $nim = $_POST["nim"];
        $password = $_POST["password"];
        if($password === ""){
            $password = $mahasiswa["password"];
        }else{
            $password = password_hash($password, PASSWORD_BCRYPT);
        }
        update("UPDATE mahasiswa SET nama='$nama', nim='$nim', password='$password'");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="nama" value="<?= $mahasiswa["nama"]?>"><br>
        <input type="text" name="nim" value="<?= $mahasiswa["nim"]?>"><br>
        <input type="password" name="password" placeholder="new password"><br>
        <button type="submit" name="update">Update</button>
        <a href="admin.php">Back</a>
    </form>
</body>
</html>