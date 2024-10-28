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
    <title>Price Check - Laundry XYZ</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <a href="home.php">Home</a>
        <a href="price_check.php">Price Check</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="price-check">
        <h2>Input to Check the Price</h2>
        <form id="priceForm">
            <label>Weight (kg):</label>
            <input type="number" id="weight" required>
            
            <label>Service:</label>
            <select id="service">
                <option value="1000">Wash Dry</option>
                <option value="1200">Wash and Ironing</option>
                <option value="900">Ironing Only</option>
            </select>

            <label>Type:</label>
            <select id="type">
                <option value="0">Regular</option>
                <option value="200">Express</option>
            </select>

            <label>Discount:</label>
            <select id="discount">
                <option value="0">Non Member</option>
                <option value="10">Member</option>
            </select>

            <button type="button" onclick="calculatePrice()">CHECK</button>
        </form>
        
        <div id="result"></div>
    </div>

    <script src="script.js"></script>
</body>
</html>
