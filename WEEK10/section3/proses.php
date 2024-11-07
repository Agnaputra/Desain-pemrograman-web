<?php
include('../section2/koneksi.php');

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
        $query = "UPDATE anggota SET nama='$nama', jenis_kelamin='$jenis_kelamin', alamat='$alamat', no_telp='$no_telp' WHERE id=$id";

        // Execute the query and check if it was successful
        if (mysqli_query($koneksi, $query)) {
            // If successful, redirect to index.php
            header("Location: ../section1/index.php");
            exit();
        } else {
            // If there is an error in updating, display the error message
            echo "Gagal mengupdate data: " . mysqli_error($koneksi);
        }
    } else {
        // If ID is not set, display an error message
        echo "ID tidak valid.";
    }

    // Close the database connection
    mysqli_close($koneksi);
}
?>
