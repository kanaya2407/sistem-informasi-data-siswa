<?php
include 'Koneksi.php';
?>

<script>
    window.print();
</script>

<table border=1 cellpadding="5" cellspacing="0" width="100%">
    <tr> 
        <th colspan="8">Data Siswa</th>
    </tr>
                                       
                                            <tr>
                                                <th>NISN</th>
                                                <th>NIS</th>
                                                <th>Nama</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Kelas</th>
                                                <th>Jurusan</th>
                                            </tr>
                                        <tbody>
                                            <?php
                                            if (isset($_GET['kelas'])) {
                                                $kelas = $_GET['kelas'];
                                                $query= mysqli_query($koneksi, "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE nama_kelas='$kelas'");
                                            } else {
                                                $query= mysqli_query($koneksi, "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan");

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
                                            </tr>
                                               <?php
                                            }
                                            ?>
                                        </tbody>
                                     </table>