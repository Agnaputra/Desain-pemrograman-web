<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Laundry XYZ</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <div class="navbar">
        <a href="home.php">Home</a>
        <a href="price_check.php">Price Check</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="banner">
        <img src="assets/banner.jpg" alt="Banner Image">
    </div>
    <div class="content">
        <h2>Company Profile</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
    </div>
</body>
</html>