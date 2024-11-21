<?php
session_start();
include 'koneksi.php';  // Include database connection

$id = $_POST['id'];

// Delete record
$query = "DELETE FROM anggota WHERE id=?";
$sql = $db1->prepare($query);
$sql->execute([$id]);

echo json_encode(['success' => 'Sukses']);

$db1 = null;
?>
