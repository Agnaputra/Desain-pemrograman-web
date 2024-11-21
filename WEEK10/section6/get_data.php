<?php
session_start();
include 'koneksi.php';  // Include database connection
include 'csrf.php';     // Include CSRF protection

$id = $_POST['id'];

// Query to fetch data for a specific member by ID
$query = "SELECT * FROM anggota WHERE id = ?";

// Prepare the SQL statement using sqlsrv_prepare
$stmt = sqlsrv_prepare($db1, $query, array(&$id));

if (sqlsrv_execute($stmt)) {
    $h = array();  // Initialize an empty array to hold the result

    // Fetch data from the result set
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $h['id'] = $row['id'];
        $h['nama'] = $row['nama'];
        $h['jenis_kelamin'] = $row['jenis_kelamin'];
        $h['alamat'] = $row['alamat'];
        $h['no_telp'] = $row['no_telp'];
    }

    // Return the data as a JSON response
    echo json_encode($h);
} else {
    echo json_encode(['error' => 'Data retrieval failed']);
}

// Close the SQL Server connection
sqlsrv_free_stmt($stmt);
?>
