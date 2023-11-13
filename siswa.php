<?php
if (isset($_POST['kelas'])) {
    $kelas = $_POST['kelas'];
}
?>

<h1 class="h3 mb-3">Siswa</h1>

<div class="row">
    <div class="col-12">
        <div class="card flex-fill">
            <div class="card-body">
                <a href="?page=tambah-siswa" class="btn btn-success btn-sm mb-3">+ Tambah Siswa</a>
                <?php
                if (!empty($_POST['kelas'])) {
                ?>
                    <a href="cetak-siswa.php?kelas=<?php echo $kelas ?>" class="btn btn-success btn-sm mb-3" target="_blank">Print</a>
                <?php
                } else {
                ?>
                    <a href="cetak-siswa.php" class="btn btn-success btn-sm mb-3" target="_blank">Print</a>

                <?php
                }
                ?>
                <form action="" method="post">
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select name="kelas" class="form-select">
                                    <option value="X" <?php echo isset($_POST['kelas']) == true ? ($_POST['kelas'] == 'X' ? 'selected' : '') : '' ?>>
                                        X
                                    </option>
                                    <option value="XI" <?php echo isset($_POST['kelas']) == true ? ($_POST['kelas'] == 'XI' ? 'selected' : '') : '' ?>>
                                        XI
                                    </option>
                                    <option value="XII" <?php echo isset($_POST['kelas']) == true ? ($_POST['kelas'] == 'XII' ? 'selected' : '') : '' ?>>
                                        XII
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <button class="btn btn-light"><i data-feather="search"></i></button>
                            <a href="?page=siswa" class="btn btn-light"><i data-feather="refresh-ccw"></i></a>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered table-striped table-hover cell-border " id="siswa">
                    <thead>
                        <tr>
                            <th>NISN</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['kelas'])) {
                            $kelas = $_POST['kelas'];
                            $query = mysqli_query($koneksi, "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE nama_kelas='$kelas'");
                        } else {
                            $query = mysqli_query($koneksi, "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas  INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan");
                        }
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $data['nisn'] ?></td>
                                <td><?php echo $data['nis'] ?></td>
                                <td><?php echo $data['nama_siswa'] ?></td>
                                <td><?php echo $data['tempat_lahir'] ?></td>
                                <td><?php echo $data['tanggal_lahir'] ?></td>
                                <td><?php echo $data['jenis_kelamin'] ?></td>
                                <td><?php echo $data['nama_kelas'] ?></td>
                                <td><?php echo $data['nama_jurusan'] ?></td>
                                <td>
                                    <a href="?page=edit-siswa&id=<?php echo $data['nisn'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="?page=hapus-siswa&id=<?php echo $data['nisn'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    let table = new DataTable('#siswa');
</script>