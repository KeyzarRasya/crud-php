<?php 
    require 'function.php';
    session_start();
    $idq = $_GET["id"];
    if(!isset($_SESSION["admin"])){
        header("Location: login.php");
    }

    $mahasiswa = findOne("SELECT * FROM mahasiswa WHERE id ='$idq'");
    if(isset($_POST["delete"])){
        $result = deleteOne($idq);
        if($result){
            echo "<script>alert('Deleted')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <h1>Are you sure want to delete this account?</h1>
    <table border="1" cellpadding="10">
        <tr>
            <th>id</th>
            <th>Nama</th>
            <th>NIM</th>
        </tr>
        <tr>
            <td><?= $mahasiswa["id"]?></td>
            <td><?= $mahasiswa["nama"]?></td>
            <td><?= $mahasiswa["nim"]?></td>
        </tr>
    </table>
    <form action="" method="post">
        <button type="submit" name="delete">YES</button>
    </form>
    <a href="admin.php">Back</a>
</body>
</html>