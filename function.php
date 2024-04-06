<?php
    $conn = mysqli_connect("localhost", "root", "", "spot");

    function register($data){
        global $conn;
        $nim = $data["nim"];
        $nama = strtolower(stripcslashes($data["nama"]));
        $password = $data["password"];
        $password2 = $data["password2"];
        
        $findnim = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim = '$nim'");
        $result = mysqli_fetch_assoc($findnim);
        if($result){
            echo "<script>alert('nim sudah digunakan')</script>";
            return false;
        }

        if($password !== $password2){
            echo "<script>alert('Your password doesnt match')</script>";
            return false;
        }

        $password = password_hash($password, PASSWORD_BCRYPT);

        mysqli_query($conn ,"INSERT INTO mahasiswa (nama, nim, password) VALUES ('$nama', '$nim', '$password')");
        return mysqli_affected_rows($conn);
    }

    function findAccount($data){
        global $conn;
        $nim = $data["nim"];
        $password = $data["password"];
        $findMahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim = '$nim'");
        $result = mysqli_fetch_assoc($findMahasiswa);
        if(password_verify($password, $result["password"])){
            session_start();
            $_SESSION["nama"] = $result["nama"];
            $_SESSION["nim"] = $result["nim"];
            $_SESSION["password"] = $result["password"];
            return $result;
        }
        return false;
    }

    function findOne($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        if(!$result){
            return false;
        }
        return mysqli_fetch_assoc($result);
    }

    function findAll(){
        global $conn;
        $result = mysqli_query($conn ,"SELECT * FROM mahasiswa");
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function update($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function deleteOne($id){
        global $conn;
        $result = mysqli_query($conn ,"DELETE FROM mahasiswa WHERE id = '$id'");
        return $result;
    }
?>