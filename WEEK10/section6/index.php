<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?= $SESSION['csrf_token'] ?>">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php" style="color: #fff;">
            CRUD Dengan Ajax
        </a>
    </nav>

    <!-- Container -->
    <div class="container mt-4">
        <h2 align="center" style="margin: 30px;">Data Anggota</h2>

        <!-- Form -->
       <form method="post" class="form-data" id="form-data">
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="hidden" name="id" id="id">
                        <input type="text" name="nama" id="nama" class="form-control" required>
                        <p class="text-danger" id="err_nama"></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Jenis Kelamin</label><br>
                        <input type="radio" name="jenis_kelamin" id="jenkel1" value="L" required> Laki-laki
                        <input type="radio" name="jenis_kelamin" id="jenkel2" value="P"> Perempuan
                        <p class="text-danger" id="err_jenis_kelamin"></p>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                <p class="text-danger" id="err_alamat"></p>
            </div>

            <div class="form-group">
                <label>No Telepon</label>
                <input type="number" name="no_telp" id="no_telp" class="form-control" required>
                <p class="text-danger" id="err_no_telp"></p>
            </div>

            <div class="form-group">
                <button type="button" name="simpan" id="simpan" class="btn btn-primary">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </div>
        </form>

        <!-- Data display section -->
        <div class="data"></div>

        <div class="text-center">
            © <?php echo date('Y'); ?> <a href="https://google.com/">Desain Dan Pemrograman Web</a>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        // Send CSRF token in headers
        $.ajaxSetup({
            headers: {
                'Csrf-Token': $("meta[name='csrf-token']").attr('content')
            }
        });

        // Load data into .data div
        $('.data').load("data.php");

        // Add event listener for save button
        $("#simpan").click(function() {
    var data = $('.form-data').serialize();
    var jenkel1 = document.getElementById("jenkel1");
    var jenkel2 = document.getElementById("jenkel2");
    var nama = document.getElementById("nama").value;
    var alamat = document.getElementById("alamat").value;
    var no_telp = document.getElementById("no_telp").value;

    // Clear previous error messages
    document.getElementById("err_nama").innerHTML = "";
    document.getElementById("err_alamat").innerHTML = "";
    document.getElementById("err_jenis_kelamin").innerHTML = "";
    document.getElementById("err_no_telp").innerHTML = "";

    var isValid = true;

    // Validate form fields
    if (nama === "") {
        document.getElementById("err_nama").innerHTML = "Nama Harus Diisi";
        isValid = false;
    }

    if (alamat === "") {
        document.getElementById("err_alamat").innerHTML = "Alamat Harus Diisi";
        isValid = false;
    }

    if (!jenkel1.checked && !jenkel2.checked) {
        document.getElementById("err_jenis_kelamin").innerHTML = "Jenis Kelamin Harus Dipilih";
        isValid = false;
    }

    if (no_telp === "") {
        document.getElementById("err_no_telp").innerHTML = "No Telepon Harus Diisi";
        isValid = false;
    }

    // If all fields are valid, proceed with AJAX submission
    if (isValid) {
        $.ajax({
            type: 'POST',
            url: "form_action.php",
            data: data,
            success: function() {
                // Reload data table
                $('.data').load("data.php");

                // Reset the form
                document.getElementById("id").value = "";
                document.getElementById("form-data").reset();
            },
            error: function(response) {
                console.log(response.responseText);
            }
        });
    }
});
    });
</script>
</body>
</html>