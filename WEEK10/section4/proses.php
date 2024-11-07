<?php
include('../section2/koneksi.php');

// Check if 'aksi' is set in the URL
if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    // Check if the action is 'hapus' (delete)
    if ($aksi == 'hapus') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Correcting the query: There was a typo in the 'WHERE' clause (should be 'id' instead of 'i')
            $query = "DELETE FROM anggota WHERE id = $id";

            // Execute the query
            if (mysqli_query($koneksi, $query)) {
                // Redirect to index.php after successful deletion
                header("Location: ../section1/index.php");
                exit();
            } else {
                // Display error message if deletion fails
                echo "Gagal menghapus data: " . mysqli_error($koneksi);
            }
        } else {
            // If ID is not valid or missing
            echo "ID tidak valid.";
        }
    }
    // Add other actions (e.g., 'ubah' for update) here if needed.
} else {
    // If 'aksi' is not set in the URL
    echo "Aksi tidak ditemukan.";
}

// Close the database connection
mysqli_close($koneksi);
?>
