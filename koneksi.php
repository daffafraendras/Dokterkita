<?php
$host     = "localhost";
$user     = "root"; // Username default XAMPP
$password = "";     // Password default XAMPP biasanya kosong
$database = "dokterkita"; // Nama database yang tadi dibuat di phpMyAdmin

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>