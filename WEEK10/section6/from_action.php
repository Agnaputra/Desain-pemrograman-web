<?php
session_start();
include 'koneksi.php';  // Include database connection
include 'csrf.php';     // Include CSRF protection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // CSRF Token validation
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token validation failed.");
    }

    // Get POST data
    $id = $_POST['id'];
    $nama = stripslashes(strip_tags(htmlspecialchars($_POST['nama'])));
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = stripslashes(strip_tags(htmlspecialchars($_POST['alamat'])));
    $no_telp = $_POST['no_telp'];

    // Check if adding or updating
    if ($id == "") {
        // Insert new record
        $query = "INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp) VALUES (?, ?, ?, ?)";
        $sql = $db1->prepare($query);
        $sql->execute([$nama, $jenis_kelamin, $alamat, $no_telp]);
    } else {
        // Update existing record
        $query = "UPDATE anggota SET nama=?, jenis_kelamin=?, alamat=?, no_telp=? WHERE id=?";
        $sql = $db1->prepare($query);
        $sql->execute([$nama, $jenis_kelamin, $alamat, $no_telp, $id]);
    }

    echo json_encode(['success' => 'Sukses']);
}
?>
