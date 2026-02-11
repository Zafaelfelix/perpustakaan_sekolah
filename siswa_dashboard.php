<?php
session_start();
if ($_SESSION['role'] != 'siswa') {
    header("Location: login.php");
    exit();
}
include 'koneksi.php';
?>

<h2>Dashboard Siswa</h2>
<p>Halo, <?= $_SESSION['nama'] ?></p>
<a href="logout.php">Logout</a>

<h3>Daftar Buku</h3>
<table border="1" cellpadding="8">
<tr>
    <th>Judul</th>
    <th>Pengarang</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>

<?php
$query = mysqli_query($conn, "SELECT * FROM buku WHERE stok > 0");
while ($buku = mysqli_fetch_assoc($query)) {
?>
<tr>
    <td><?= $buku['judul'] ?></td>
    <td><?= $buku['pengarang'] ?></td>
    <td><?= $buku['stok'] ?></td>
    <td>
        <a href="pinjam.php?id=<?= $buku['id_buku'] ?>">Pinjam</a>
    </td>
</tr>
<?php } ?>
</table>

<h3>Buku Saya</h3>
<table border="1" cellpadding="8">
<tr>
    <th>Judul</th>
    <th>Tgl Pinjam</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php
$id_user = $_SESSION['id_user'];
$q = mysqli_query($conn, "SELECT p.*, b.judul FROM peminjaman p JOIN buku b ON p.id_buku=b.id_buku WHERE p.id_user='$id_user'");
while ($row = mysqli_fetch_assoc($q)) {
?>
<tr>
    <td><?= $row['judul'] ?></td>
    <td><?= $row['tanggal_pinjam'] ?></td>
    <td><?= $row['status'] ?></td>
    <td>
        <?php if ($row['status'] == 'dipinjam') { ?>
            <a href="kembali.php?id=<?= $row['id_pinjam'] ?>">Kembalikan</a>
        <?php } ?>
    </td>
</tr>
<?php } ?>
</table>