<?php
include('koneksi.php'); // Include the connection file

if ($conn) {
    echo "Koneksi berhasil.<br />";
} else {
    echo "Koneksi Gagal";
    die(print_r(sqlsrv_errors(), true));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Anggota</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Data Anggota</h2>
    <a href="../section2/create.php" class="btn-tambah">Tambah Anggota</a>
    <?php
    $query  = "SELECT * FROM anggota ORDER BY id DESC";
    $result = sqlsrv_query($conn, $query);

    if ($result && sqlsrv_has_rows($result)) {
        $no = 1;
        echo "<table>";
        echo "<tr><th>No</th><th>Nama</th><th>Jenis Kelamin</th><th>Alamat</th><th>No. Telp</th><th>Aksi</th></tr>";
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $kelamin = ($row["jenis_kelamin"] === 'L') ? 'Laki-Laki' : 'Perempuan';
            echo "<tr>
                <td>" . $no++ . "</td>
                <td>" . $row["nama"] . "</td>
                <td>" . $kelamin . "</td>
                <td>" . $row["alamat"] . "</td>
                <td>" . $row["no_telp"] . "</td>
                <td>
                    <a href='../section3/edit.php?id=" . $row["id"] . "'>Edit</a> |
                    <a href='#' onclick='konfirmasiHapus(" . $row["id"] . ", \"" . $row["nama"] . "\")'>Hapus</a>
                </td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data.";
    }

    sqlsrv_close($conn);
    ?>
</div>
<script>
function konfirmasiHapus(id, nama) {
    var konfirmasi = confirm("Apakah Anda yakin ingin menghapus data dengan Nama " + nama + "?");
    if (konfirmasi) {
        window.location.href = "../section4/proses.php?aksi=hapus&id=" + id;
    }
}
</script>
</body>
</html>
