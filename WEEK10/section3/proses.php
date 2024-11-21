<?php
include('../section2/koneksi.php'); // Include the connection file

$aksi = $_GET['aksi'];

if ($aksi == 'ubah') {
    // Check if the form is submitted with an 'id' value
    if (isset($_POST['id'])) {
        // Get the updated values from the form
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];

        // SQL query to update the member data
        $query = "UPDATE anggota SET nama = ?, jenis_kelamin = ?, alamat = ?, no_telp = ? WHERE id = ?";
        $params = array($nama, $jenis_kelamin, $alamat, $no_telp, $id);

        // Execute the query
        $stmt = sqlsrv_query($conn, $query, $params);

        // Check if the update was successful
        if ($stmt) {
            // If successful, redirect to index.php
            header("Location: ../section1/index.php");
            exit();
        } else {
            // If there is an error in updating, display the error message
            echo "Gagal mengupdate data: " . print_r(sqlsrv_errors(), true);
        }
    } else {
        // If ID is not set, display an error message
        echo "ID tidak valid.";
    }

    // Close the database connection
    sqlsrv_close($conn);
}
?>
