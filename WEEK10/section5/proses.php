<?php
include('koneksi.php');  // Include database connection

$aksi = $_GET['aksi'];

if ($aksi == 'tambah') {
    // Handle data addition
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];

    $query = "INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp) 
              VALUES ('$nama', '$jenis_kelamin', '$alamat', '$no_telp')";
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

if ($aksi == 'ubah') {
    // Handle data update
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];

    $query = "UPDATE anggota SET 
              nama = '$nama', jenis_kelamin = '$jenis_kelamin', 
              alamat = '$alamat', no_telp = '$no_telp' 
              WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

if ($aksi == 'hapus') {
    // Handle data deletion
    $id = $_GET['id'];

    $query = "DELETE FROM anggota WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
