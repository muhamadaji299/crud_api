<?php
$mysqli = new mysqli("localhost", "root", "", "crud_api");

if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

$result = $mysqli->query("SHOW TABLES");
while ($row = $result->fetch_array()) {
    $table = $row[0];
    $mysqli->query("CHECK TABLE $table");
    $mysqli->query("REPAIR TABLE $table");
    echo "Checked and repaired: $table\n";
}

$mysqli->close();
?>
