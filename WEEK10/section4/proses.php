<?php
include('../section2/koneksi.php'); // Include the SQL Server connection

// Ensure that the connection was established
if (!$conn) {
    die("Koneksi database gagal");
}

// Check if 'aksi' is set in the URL
if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    // Check if the action is 'hapus' (delete)
    if ($aksi == 'hapus') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Use a parameterized query for SQL Server to prevent SQL injection
            $query = "DELETE FROM anggota WHERE id = ?";
            $params = array($id);

            // Prepare and execute the query
            $stmt = sqlsrv_query($conn, $query, $params);

            if ($stmt) {
                // Redirect to index.php after successful deletion
                header("Location: ../section1/index.php");
                exit();
            } else {
                // Display error message if deletion fails
                echo "Gagal menghapus data: " . print_r(sqlsrv_errors(), true);
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
sqlsrv_close($conn);
?>
