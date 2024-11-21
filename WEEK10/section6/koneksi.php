<?php
$host     = "LAPTOP-DL9EJTU3\MSSQLSERVER01";  // SQL Server name and instance
$database = "prakwebdb";                      // Your database name
$username = "";                               // Username if required
$password = "";                               // Password if required

// Connection options
$connInfo = array("Database" => $database, "UID" => $username, "PWD" => $password);
$conn = sqlsrv_connect($host, $connInfo);

// Check connection
if (!$conn) {
    echo "Connection failed: ";
    die(print_r(sqlsrv_errors(), true));
}

// Assign the connection to $db1 variable for use in other files
$db1 = $conn;
?>
