<?php 
    require 'function.php';
    session_start();
    if(!isset($_SESSION["admin"])){
        header("Location: login.php");
    }
    $mahasiswa = findAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hi Admin</h1>
    <table border="1" cellpadding="10">
        <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Action</th>
        </tr>
        <?php foreach($mahasiswa as $mhs) :?>
        <tr>
            <td><?= $mhs["id"]?></td>
            <td><?= $mhs["nama"]?></td>
            <td><?= $mhs["nim"]?></td>
            <td><a href="edit.php?id=<?=$mhs["id"]?>">Edit</a> | <a href="delete.php?id=<?=$mhs["id"]?>">Delete</a></td>
        </tr>
        <?php endforeach;?>
    </table>
    <a href="logout.php">Logout</a>
</body>
</html>