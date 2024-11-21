<?php
include('koneksi.php');  // Include database connection

$aksi = $_GET['aksi'];

if ($aksi == 'tambah') {
    // Handle data addition
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];

    // SQL query for data insertion
    $query = "INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp) 
              VALUES (?, ?, ?, ?)";
              
    // Prepare and execute the query
    $params = array($nama, $jenis_kelamin, $alamat, $no_telp);
    $stmt = sqlsrv_query($conn, $query, $params);
    
    if ($stmt) {
        header("Location: index.php");
    } else {
        echo "Error: " . print_r(sqlsrv_errors(), true);
    }
}

if ($aksi == 'ubah') {
    // Handle data update
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];

    // SQL query for data update
    $query = "UPDATE anggota SET 
              nama = ?, jenis_kelamin = ?, 
              alamat = ?, no_telp = ? 
              WHERE id = ?";
              
    // Prepare and execute the query
    $params = array($nama, $jenis_kelamin, $alamat, $no_telp, $id);
    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt) {
        header("Location: index.php");
    } else {
        echo "Error: " . print_r(sqlsrv_errors(), true);
    }
}

if ($aksi == 'hapus') {
    // Handle data deletion
    $id = $_GET['id'];

    // SQL query for data deletion
    $query = "DELETE FROM anggota WHERE id = ?";
    
    // Prepare and execute the query
    $params = array($id);
    $stmt = sqlsrv_query($conn, $query, $params);
    
    if ($stmt) {
        header("Location: index.php");
    } else {
        echo "Error: " . print_r(sqlsrv_errors(), true);
    }
}

// Close the SQL Server connection
sqlsrv_close($conn);
?>
