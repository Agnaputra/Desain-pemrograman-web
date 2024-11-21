<?php
session_start();

// Include the database connection file
include 'koneksi.php';  // Make sure koneksi.php is in the same directory as data.php

$no = 1;  // Variable to track row number in the table

// SQL query to select all records from 'anggota' table
$query = "SELECT * FROM anggota ORDER BY id DESC";

// Check if the connection is successful
if ($conn) {
    // Execute the SQL query
    $sql = sqlsrv_query($conn, $query);
    
    // If the query fails, display error messages
    if ($sql === false) {
        die(print_r(sqlsrv_errors(), true));
    }
} else {
    // If the connection failed, show a message and stop the execution
    die("Database connection failed.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota</title>
    <!-- Link to DataTables CSS for styling -->
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Data Anggota</h2>
        <table id="example" class="table table-striped table-bordered" style="width: 100%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (sqlsrv_has_rows($sql)) {
                    // Loop through the results and display in table rows
                    while ($row = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)) {
                        $id = $row['id'];
                        $nama = $row['nama'];
                        $jenis_kelamin = ($row['jenis_kelamin'] == 'L') ? 'Laki-laki' : 'Perempuan';
                        $alamat = $row['alamat'];
                        $no_telp = $row['no_telp'];
                ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $nama ?></td>
                            <td><?= $jenis_kelamin ?></td>
                            <td><?= $alamat ?></td>
                            <td><?= $no_telp ?></td>
                            <td>
                                <button id="<?php echo $id; ?>" class="btn btn-success btn-sm edit_data">
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                                <button id="<?php echo $id; ?>" class="btn btn-danger btn-sm hapus_data">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                ?>
                    <tr>
                        <td colspan="6">Tidak ada data ditemukan</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Link to jQuery, DataTables, and Bootstrap JS for functionality -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            // Initialize DataTables for the table
            $('#example').DataTable();
        });

        // Edit button functionality
        $(document).on('click', '.edit_data', function() {
            var id = $(this).attr("id");
            $.ajax({
                type: "POST",
                url: "get_data.php",
                data: {id: id},
                dataType: "json",
                success: function(response) {
                    // Handle edit response (you can use modal or redirect for editing)
                    console.log(response);
                }
            });
        });

        // Delete button functionality
        $(document).on('click', '.hapus_data', function() {
            var id = $(this).attr("id");
            $.ajax({
                type: "POST",
                url: "hapus_data.php",
                data: {id: id},
                success: function(response) {
                    // Handle delete response, such as refreshing the page
                    alert("Data deleted successfully!");
                    location.reload();  // Refresh the page after deletion
                }
            });
        });
    </script>
</body>
</html>
