<?php
session_start();


$username = $_POST['username'];
$password = $_POST['password'];

if (empty($username) || empty($password)) {
    echo "<script>alert('Username dan password harus diisi!'); window.location.href='../login.html';</script>";
    exit;
} elseif (strlen($password) > 6) {
    echo "<script>alert('Kata sandi lebih dari 6 karakter!'); window.location.href='../login.html';</script>";
    exit;
}elseif (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password)) {
    echo "<script>alert('Kata sandi harus terdiri dari huruf besar dan huruf kecil!'); window.location.href='../login.html';</script>";
    exit;
} elseif ($username == "user" && $password == "User12") {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    // header("Location: ../homePage.php");
    echo "<script>alert('Berhasil Login!'); window.location.href='../homePage.html';</script>";
    exit;
} else {
    echo "<script>alert('Login Gagal! Username atau Password salah!'); window.location.href='../login.html';</script>";
    exit;
}
?>