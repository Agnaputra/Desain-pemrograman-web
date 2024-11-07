<?php
session_start();
include 'koneksi.php'; // Make sure the file name is correct
include 'csrf.php'; // Ensure CSRF handling is implemented

// Sanitize inputs
$nama = stripslashes(strip_tags(htmlspecialchars($_POST['nama'], ENT_QUOTES)));
$jenis_kelamin = stripslashes(strip_tags(htmlspecialchars($_POST['jenis_kelamin'], ENT_QUOTES)));
$alamat = stripslashes(strip_tags(htmlspecialchars($_POST['alamat'], ENT_QUOTES)));
$no_telp = stripslashes(strip_tags(htmlspecialchars($_POST['no_telp'], ENT_QUOTES)));

// Check if CSRF token is valid
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    echo json_encode(['error' => 'CSRF token invalid']);
    exit;
}

// Database connection
include 'koneksi.php'; // Ensure this file contains valid DB connection code

$query = "INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp) VALUES (?, ?, ?, ?)";
$sql = $db1->prepare($query);
$sql->bind_param("ssss", $nama, $jenis_kelamin, $alamat, $no_telp);

// Execute query and check for errors
if ($sql->execute()) {
    echo json_encode(['success' => 'Sukses']);
} else {
    echo json_encode(['error' => 'Error executing query']);
}

$sql->close();
$db1->close();
?>
