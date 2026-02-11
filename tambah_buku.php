<?php include 'koneksi.php'; ?>
<h2>  Tambah Buku </h2>
<form action ="" method = "POST">
    judul: <input type = "text" name="judul"> <br><br>
    pengarang: <input type = "text" name="pengarang"> <br><br>
    penerbit: <input type = "text" name="penerbit"> <br><br>
    tahun: <input type = "number" name="tahun"> <br><br>
    stok: <input type = "number" name="stok"> <br><br>
    <button name = "simpan">Simpan</button>
</form>

<?php 
if (isset ($_POST ['simpan'])){
    mysqli_query($conn, "INSERT INTO buku VALUES('', '$_POST[judul]', '$_POST[pengarang]','$_POST[penerbit]', '$_POST[tahun]', '$_POST[stok]', NOW())");
    header ("Location: admin_dashboard.php");

}
?>

