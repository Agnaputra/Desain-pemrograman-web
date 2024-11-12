<?php
// Start the session if it has not already been started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user has a 'level' session variable
if (!empty($_SESSION['level'])) {
    // Include required files
    require 'config/koneksi.php';
    require 'fungsi/pesan_kilat.php';

    // Include the header template
    include 'admin/template/header.php';

    // Check if the 'page' parameter is set in the URL
    if (!empty($_GET['page'])) {
        // Include the specific module based on 'page' parameter
        include 'admin/module/' . $_GET['page'] . '/index.php';
    } else {
        // If 'page' is not set, include the home template
        include 'admin/template/home.php';
    }

    // Include the footer template
    include 'admin/template/footer.php';

} else {
    // Redirect to login page if 'level' session variable is not set
    header("Location: login.php");
    exit(); // It's good practice to include exit() after a redirect to stop further script execution
}
?>
