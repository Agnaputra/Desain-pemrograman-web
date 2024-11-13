<?php
include "../../config/koneksi.php";
include "../../template/header.php";
include "../../template/menu.php";

$query = "SELECT * FROM jabatan";
$result = mysqli_query($koneksi, $query);
?>

<div class="container">
    <h2>Job Positions</h2>
    <a href="add.php">Add New Position</a>
    <table>
        <tr>
            <th>No</th>
            <th>Position</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['jabatan']; ?></td>
                <td><?= $row['keterangan']; ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?= $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<?php include "../../template/footer.php"; ?>
