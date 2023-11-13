<?php
if (isset($_POST['nama_kelas'])) {
   $nama_kelas = $_POST['nama_kelas'];
   $id_jurusan= $_POST['id_jurusan'];
   
   $query = mysqli_query($koneksi, "INSERT INTO kelas (nama_kelas,id_jurusan) VALUE('$nama_kelas','$id_jurusan')");

   if ($query) {
   echo '<script>alert("Data Berhasil di Tambah");location.href="?page=kelas";</script>';
   }
}
?>


<h1 class="h3 mb-3">tambah Kelas</h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card flex-fill">
                               
                                 <div class="card-body">
                                    <form method="post">
									<div class="mb-3">
										<label class="form-label">Nama Kelas</label>
										<div class="col-12">
											<input type="text" name="nama_kelas" class="form-control">
										</div>
									</div>
                                    <div class="mb-3">
										<label class="form-label">Jurusan</label>
										<select name="id_jurusan" class="form-select">
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM jurusan");
                                            while ($data = mysqli_fetch_array($query)) {
                                               ?>
                                               <option value="<?php echo $data['id_jurusan'] ?>"><?php echo $data['nama_jurusan'] ?></option>
                                               <?php
                                            }
                                            ?>
                                        </select>
									</div>
									<div class="mb3">
										<button class="btn btn-primary">Simpan</button>
									</div>	
									</form>
                                 </div>
                               </div>
                           </div>
                      </div>