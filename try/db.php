<?php
// Database connection settings
$host = 'LAPTOP-DL9EJTU3\MSSQLSERVER01';  // SQL Server host name or IP
$dbname = 'sibatta';                       // Your database name
$username = '';           // SQL Server username (if any)
$password = '';           // SQL Server password (if any)

try {
    $pdo = new PDO("sqlsrv:Server=$host;Database=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection successful!";
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>
