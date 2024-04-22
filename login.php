<?php

$mysqli = new mysqli('localhost', 'root', '', 'jasa_design_grafis');

if(isset($_POST["login"])){


    $username= $_POST["username"];
    $password= $_POST["password"];

    $result = mysqli_query($mysqli," SELECT * FROM user WHERE username= '$username' AND password='$password'");

    //cek username
    if( mysqli_num_rows($result ) === 1){
    $row =mysqli_fetch_assoc($result );
    
    header("location:home.php");
    "<script>
    alert('Salamat Datang!')</script>";
    exit;
}


    $error=true;
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>login only</title>
</head>
<body>

    
    <?php
    include "layout/header.html"
    ?>

    <h3>Masuk akun</h3>
    <form action="login.php" method="POST">
        <input type="text" placeholder="username" name="username"/>
        <input type="password" placeholder="password" name="password"/>
        <?php if(isset($error)):?>
                <p align="center" style="color : red; font-style:italic;">Password / Username Salah Bosss</p>
                <?php endif;?>
        <button type="submit" name="login">Masuk Sekarang</button>
    </form>


</body>

</html>
