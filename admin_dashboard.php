<?php
    session_start();
    if ($_SESSION ['role'] != 'admin'){
        header ("Location: login.php");
        exit();
    }
    include 'koneksi.php';
    ?>

    <h2>Dashboard Admin </h2>
    <a href = "tambah_buku.php"> + Tambah Buku</a>
    <a href = "logout.php"> Logout</a>
    <br><br>

    <table border="1" cellpadding="8">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>


    <?php
    $no = 1;
    $query = mysqli_query($conn, "SELECT * FROM buku");
    while ($data = mysqli_fetch_assoc($query)){
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['judul'] ?></td>
            <td><?= $data['pengarang'] ?></td>
            <td><?= $data['stok'] ?></td>

            <td>
                <a href = "edit_buku.php?id=<?= $data['id_buku'] ?>">Edit</a> |
                
                <a href = "hapus_buku.php?id=<?= $data['id_buku'] ?>">hapus</a> |

            </td>
        </tr>
    <?php } ?>
</table>