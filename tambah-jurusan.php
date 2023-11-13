<?php
if (isset($_POST['nama_jurusan'])) {
    $nama_jurusan = $_POST['nama_jurusan'];

    $query = mysqli_query($koneksi, "INSERT INTO jurusan (nama_jurusan)VALUES('$nama_jurusan')");

    if ($query) {
        echo '<script>alert("Data Berhasl di Tambah");location.href="?page=jurusan"</script>';
    }
}
?>

<h1 class="h3 mb-3">tambah jurusan</h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card flex-fill">
                               
                                 <div class="card-body">
                                    <form method="post">
									<div class="mb-3">
										<label class="form-label">Nama Jurusan</label>
										<div class="col-12">
											<input type="text" name="nama_jurusan" class="form-control">
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