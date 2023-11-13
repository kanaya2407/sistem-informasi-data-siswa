<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM kelas WHERE id_kelas='$id'");
if ($query) {
    echo '<script>alert("Data Berhasil di Hapus");location.href="?page=kelas";</script>';
}