<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Data Anggota</h2>
    
    <!-- Link to add new data -->
    <a class="btn btn-success mt-2" href="create.php">Tambah Data</a>
    <br><br>
    
    <?php
    include('koneksi.php');  // Include database connection

    // Query to fetch data from the database
    $query = "SELECT * FROM anggota ORDER BY id DESC";
    $stmt = sqlsrv_query($conn, $query);

    if ($stmt === false) {
        die("Query failed: " . print_r(sqlsrv_errors(), true));
    }
    ?>
    
    <!-- Table to display data -->
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No. Telp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $kelamin = ($row["jenis_kelamin"] == 'L') ? 'Laki-Laki' : 'Perempuan';
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($row["nama"]); ?></td>
                    <td><?php echo $kelamin; ?></td>
                    <td><?php echo htmlspecialchars($row["alamat"]); ?></td>
                    <td><?php echo htmlspecialchars($row["no_telp"]); ?></td>
                    <td>
                        <!-- Edit button -->
                        <a class="btn btn-primary" href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
                        <!-- Delete button with modal confirmation -->
                        <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#hapusModal<?php echo $row["id"]; ?>">Hapus</a>
                    </td>
                </tr>

                <!-- Modal for delete confirmation -->
                <div class="modal fade" id="hapusModal<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin menghapus data dengan nama "<?php echo htmlspecialchars($row["nama"]); ?>"?
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-danger" href="proses.php?aksi=hapus&id=<?php echo $row["id"]; ?>">Hapus</a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </tbody>
    </table>
    
    <?php
    // Free the statement resource and close the connection
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
    ?>
</div>

<!-- Include necessary scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
