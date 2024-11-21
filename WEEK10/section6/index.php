<?php
session_start();
include 'koneksi.php';  // Include database connection
include 'csrf.php';     // Include CSRF protection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <title>Data Anggota</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <a href="index.php" class="navbar-brand" style="color: #fff">CRUD Dengan Ajax</a>
    </nav>

    <div class="container">
        <h2 align="center" style="margin: 30px;">Data Anggota</h2>

        <form method="post" class="form-data" id="form-data">
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="hidden" name="id" id="id">
                        <input type="text" name="nama" id="nama" class="form-control" required="true">
                        <p class="text-danger" id="err_nama"></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Jenis Kelamin</label><br>
                        <input type="radio" name="jenis_kelamin" id="jenkel1" value="L" required="true">Laki-laki
                        <input type="radio" name="jenis_kelamin" id="jenkel2" value="P" required="true">Perempuan
                    </div>
                    <p class="text-danger" id="err_jenis_kelamin"></p>
                </div>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control"></textarea>
                <p class="text-danger" id="err_alamat"></p>
            </div>

            <div class="form-group">
                <label>No Telepon</label>
                <input type="number" name="no_telp" id="no_telp" class="form-control" required="true">
                <p class="text-danger" id="err_no_telp"></p>
            </div>

            <div class="form-group">
                <button type="button" name="simpan" id="simpan" class="btn btn-primary">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </div>
        </form>

        <hr>

        <div class="data"></div>
    </div>

    <div class="text-center">&copy; <?= date('Y') ?> Copyright: <a href="https://google.com/">Desain Dan Pemrograman Web</a></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            // Setup CSRF token
            $.ajaxSetup({
                headers: {
                    'Csrf-Token': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Load data
            $('.data').load("data.php");

            // Save or Update
            $("#simpan").click(function() {
                var data = $('.form-data').serialize();

                // Validation
                if (document.getElementById("nama").value == "") {
                    document.getElementById("err_nama").innerHTML = "Nama Harus Diisi";
                } else {
                    document.getElementById("err_nama").innerHTML = "";
                }

                if (document.getElementById("alamat").value == "") {
                    document.getElementById("err_alamat").innerHTML = "Alamat Harus Diisi";
                } else {
                    document.getElementById("err_alamat").innerHTML = "";
                }

                if (!document.getElementById("jenkel1").checked && !document.getElementById("jenkel2").checked) {
                    document.getElementById("err_jenis_kelamin").innerHTML = "Jenis Kelamin Harus Diisi";
                } else {
                    document.getElementById("err_jenis_kelamin").innerHTML = "";
                }

                if (document.getElementById("no_telp").value == "") {
                    document.getElementById("err_no_telp").innerHTML = "No Telepon Harus Diisi";
                } else {
                    document.getElementById("err_no_telp").innerHTML = "";
                }

                // If all fields are valid, submit data
                if (document.getElementById("nama").value != "" && document.getElementById("alamat").value != "" && (document.getElementById("jenkel1").checked || document.getElementById("jenkel2").checked) && document.getElementById("no_telp").value != "") {
                    $.ajax({
                        type: 'POST',
                        url: "form_action.php",  // Ensure the correct path
                        data: data,
                        success: function(response) {
                            $('.data').load("data.php");
                            document.getElementById("form-data").reset();
                        },
                        error: function(xhr, status, error) {
                            console.log("Error: " + error);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
