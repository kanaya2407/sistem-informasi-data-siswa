<?php
$id = $_SESSION['user']['id'];
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'");
$data = mysqli_fetch_array($query);

if (isset($_POST['nama'])) {
   $id = $_SESSION['user']['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];

if (isset($_FILES['foto'])) {
    $foto = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];

    $fotobaru = rand(). '_' .$foto;

    $path = "foto/" .$fotobaru;

    if (move_uploaded_file($foto_tmp, $path)) {
        if(is_file("foto/" . $data['foto']))
        unlink("foto/" . $data['foto']);
    
        $query = mysqli_query($koneksi, "UPDATE user SET nama='$nama',username='$username',foto='$fotobaru' WHERE id='$id'");
        $session = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'");
    
        if ($query) {
            $_SESSION['user'] = mysqli_fetch_array($session);
            echo '<script>alert("Profil Berhasil di Update");location.href="?page=profil";</script>';
        }


    }
}

   
    $query = mysqli_query($koneksi, "UPDATE user SET nama='$nama',username='$username' WHERE id='$id'");
    $session = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'");

    if ($query) {
        $_SESSION['user'] = mysqli_fetch_array($session);
        echo '<script>alert("Profil Berhasil di Update");location.href="?page=profil";</script>';
    }
}

if (isset($_POST['password_lama'])) {
	$username = $_SESSION['user']['username'];
	$password_lama = md5($_POST['password_lama']);
	$password_baru = md5($_POST['password_baru']);

	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password_lama'");
	$data = mysqli_num_rows($query);

	if ($data == 0) {
		echo '<script>alert("Password Lama Tidak Sesuai");location.href="?page=profil";</script>';
	}elseif ($_POST['password_baru'] != $_POST['konfirmasi_password_baru']) {
		echo '<script>alert("Konfirmasi Password Tidak Sesuai");location.href="?page=profil";</script>';
	} else {
		$query = mysqli_query($koneksi, "UPDATE user SET password='$password_baru' WHERE username='$username'");
		if ($query) {
			echo '<script>alert("Password Berhasil di Upadte");location.href="?page=profil";</script>';
		}

	}
}
?>

<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Profile</h1>
					</div>
					<div class="row">
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">Profile Details</h5>
								</div>
								<div class="card-body text-center">
									<img src="foto/<?php echo $_SESSION['user']['foto'] ?>" alt="Christina Mason"
										class="img-fluid rounded-circle mb-2" width="128" height="128" />
									<h5 class="card-title mb-0"><?php echo $_SESSION['user']['nama'] ?></h5>
								</div>
							</div>
						</div>

						<div class="col-5">
							<div class="card">
								<div class="card-header">

									<h5 class="card-title mb-0 text-center">Edit Profil</h5>
								</div>
								<div class="card-body h-100">
									<form action="" method="post" enctype="multipart/form-data">
										<div class="mb-3">
											<label class="form-label">Nama Lengkap</label>
											<div class="col-12">
												<input type="text" name="nama" class="form-control" value="<?php echo $_SESSION['user']['nama'] ?>" >
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">Username</label>
											<div class="col-12">
												<input type="text" name="username" class="form-control" value="<?php echo $_SESSION['user']['username'] ?>">
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">Foto</label>
											<div class="col-12">
												<input type="file" name="foto" class="form-control">
											</div>
										</div>
										<div class="mb-3 text-center">
											<button class="btn btn-primary">Simpan</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-4">
							<div class="card">
								<div class="card-header">

									<h5 class="card-title mb-0 text-center">Edit Password</h5>
								</div>
								<div class="card-body h-100">
									<form action="" method="post">
										<div class="mb-3">
											<label class="form-label">Passwoard Lama</label>
											<div class="col-12">
												<input type="password" name="password_lama" class="form-control" required>
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">Passwoard Baru</label>
											<div class="col-12">
												<input type="password" name="password_baru" class="form-control" required>
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">Konfirmasi Password Baru</label>
											<div class="col-12">
												<input type="password" name="konfirmasi_password_baru" class="form-control" required>
											</div>
										</div>
										<div class="mb-3 text-center">
											<button class="btn btn-primary">Simpan</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
