<?php
// Database credentials


$serverName = "212.11.39.88,1433";
$connectionInfo = array("Database" => "AsianDB", "UID" => "sadmin", "PWD" => "Ed%#OR12!@");
$conn = sqlsrv_connect($serverName, $connectionInfo);

if (!$conn) {
    die("Connection failed: " . print_r(sqlsrv_errors(), true));
}
?>