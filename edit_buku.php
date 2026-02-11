<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM buku WHERE id_buku= '$id'"));
?>
<h2>Edit Buku</h2>
    <form method= "POST">
    judul : <input type= "text" name= "judul" value="<?= $data['judul']?>"><br><br>
    pengarang : <input type= "text" name= "pengarang" value="<?= $data['pengarang']?>"><br><br>
    stok : <input type= "text" name= "stok" value="<?= $data['stok']?>"><br><br>
    <button name="update">Update</button>
    </form>
<?php
if (isset($_POST['update'])){
    mysqli_query($conn, "UPDATE buku SET judul= '$_POST[judul]', pengarang= '$_POST[pengarang]', stok= '$_POST[stok]' WHERE id_buku= '$id'");
    header("Location: admin_dashboard.php");
}
?>
