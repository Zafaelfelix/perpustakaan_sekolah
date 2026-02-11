
<?php
session_start();
include 'koneksi.php';
$id_user = $_SESSION['id_user'];
$id_buku = $_GET ['id'];
$tgl = date ('Y-m-d ');
mysqli_query($conn, "INSERT INTO peminjaman VALUES('', '$id_user', '$id_buku', '$tgl', DATE_ADD('$tgl', INTERVAL 7 DAY), 'dipinjam')");
mysqli_query($conn, "UPDATE buku SET stok = stok -1 WHERE id_buku = '$id_buku'");

header("Location: siswa_dashboard.php");
?>