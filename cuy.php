<?php

// Koneksi ke database
$conn = new PDO("mysql:host=localhost;dbname=mydb", "root", "");

// Validasi input
if (empty($_POST["username"])) {
    echo "<script>alert('Username harus diisi!');</script>";
    exit;
}
if (empty($_POST["password"])) {
    echo "<script>alert('Password harus diisi!');</script>";
    exit;
}

// Cek apakah username dan password valid
$sql = "SELECT id FROM users WHERE username = :username AND password = :password";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":username", $_POST["username"]);
$stmt->bindParam(":password", md5($_POST["password"]));
$stmt->execute();
$row = $stmt->fetch();

if (!$row) {
    echo "<script>alert('Username atau password salah!');</script>";
    exit;
}

// Buat session
session_start();
$_SESSION["username"] = $_POST["username"];

// Arahkan ke halaman utama
echo "<script>window.location.href = 'form register.php';</script>";

?>
