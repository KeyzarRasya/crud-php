<?php 
    require 'function.php';
    if(isset($_POST["register"])){
        
        if(register($_POST) > 0){
            echo "<script>alert('Mahasiswa ditambahkan!')</script>";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Buat Akun</h1>
    <form action="" method="post">
        <input type="text" name="nama" placeholder="fullname"><br>
        <input type="text" name="nim" placeholder="nim"><br>
        <input type="password" name="password" placeholder="password"><br>
        <input type="password" name="password2" placeholder="konfirmasi password"><br>
        <button type="submit" name="register">Register</button>
        <p>Already have account? <a href="login.php">Login</a></p>
    </form>
</body>
</html>