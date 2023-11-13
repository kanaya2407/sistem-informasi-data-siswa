<?php
$id = $_GET['id'];
if (isset($_POST['nama_jurusan'])) {
    $nama_jurusan = $_POST['nama_jurusan'];

    $query = mysqli_query($koneksi, "UPDATE jurusan SET nama_jurusan='$nama_jurusan' WHERE id_jurusan='$id'");

    if ($query) {
        echo '<script>alert("Data Berhasl di Update");location.href="?page=jurusan"</script>';
    }
}
$query = mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id_jurusan='$id'");
$data = mysqli_fetch_array($query);
?>

<h1 class="h3 mb-3">Ubah Jurusan</h1>

<div class="row">
    <div class="col-12">
        <div class="card flex-fill">

            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Nama Jurusan</label>
                        <div class="col-12">
                            <input type="text" name="nama_jurusan" class="form-control" value="<?php echo $data['nama_jurusan'] ?>">
                        </div>
                    </div>
                    <div class="mb3">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>