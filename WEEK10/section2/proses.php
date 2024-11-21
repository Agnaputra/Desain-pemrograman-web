<?php
// Include database connection
include('koneksi.php');

// Check if form is submitted
if (isset($_POST['nama']) && isset($_POST['jenis_kelamin']) && isset($_POST['alamat']) && isset($_POST['no_telp'])) {
    $aksi = $_GET['aksi'] ?? '';  // Check if 'aksi' parameter is set
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];

    // Perform action based on 'aksi' parameter
    if ($aksi == 'tambah') {
        // Insert data into the database
        $query = "INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp) VALUES (?, ?, ?, ?)";
        $params = array($nama, $jenis_kelamin, $alamat, $no_telp);

        // Execute the query
        $stmt = sqlsrv_query($conn, $query, $params);

        // Check if query was successful
        if ($stmt) {
            // Redirect to index.php after successful insertion
            header("Location: ../section1/index.php");
            exit();
        } else {
            // Output error message if query fails
            echo "Gagal menambahkan data: " . print_r(sqlsrv_errors(), true);
        }
    }
} else {
    echo "Data tidak lengkap!";
}

// Close the database connection
sqlsrv_close($conn);
?>
