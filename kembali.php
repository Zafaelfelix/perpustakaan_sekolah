<?php
session_start();
include 'koneksi.php';

$id_pinjam = $_GET['id'];
mysqli_query($conn, "UPDATE peminjaman SET status='dikembalikan' WHERE id_pinjam='$id_pinjam'");

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id_buku FROM peminjaman WHERE id_pinjam='$id_pinjam'"));
mysqli_query($conn, "UPDATE buku SET stok = stok + 1 WHERE id_buku='$data[id_buku]'");

header("Location: siswa_dashboard.php");
?>
   