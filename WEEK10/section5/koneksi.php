<?php
// Database connection
$koneksi = mysqli_connect("localhost", "root", "", "prakwebdb");

// Check connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
