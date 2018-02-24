<?php
require_once 'core/init.php';
require_once 'view/header.php'; ?>

<h2>Edit Data Kehadiran Karyawan</h2>
<?php
$error='';
$id = $_GET['id'];
if(isset($_GET['id'])){
  $satukehadiran = tampilkan_kehadiran_id($id);
  while ($row = mysqli_fetch_assoc($satukehadiran)) {
    $id_karyawan = $row['id_karyawan'];
    $nama       = $row['nama'];
    $tanggal = $row['tanggal'];
    $jamdatang = $row['jam_datang'];
    $jampulang = $row['jam_pulang'];
  }

if(isset($_POST['submit'])){
  $id_karyawan   = $_POST['id_karyawan'];
  $tanggal       = $_POST['tanggal'];
  $jamdatang     = $_POST['jam_datang'];
  $jampulang     = $_POST['jam_pulang'];

  if(!empty(trim($id_karyawan)) && !empty(trim($tanggal)) && !empty(trim($jamdatang)) && !empty(trim($jampulang))){

    if(edit_data_kehadiran($id_karyawan, $tanggal, $jamdatang, $jampulang, $id)){
      header('Location: kehadiran.php');
    } else {
      $error = 'Ada masalah saat menambah data';
    }
  }else{
     $error='Ada data yang masih kosong, wajib di isi semua';
  }
}
 ?>

<form action="" method="POST">
<table class="kehadiran">
  <tr>
    <td><label for="nama">Nama</label></td>
    <td>&nbsp;:&nbsp;</td>
    <td>
      <select id="nama" name="id_karyawan">
				<option value="">--- Pilih Karyawan ---</option>
					<?php
					$karyawan = tampilkan_karyawan();
					while($pilih = mysqli_fetch_assoc($karyawan)){
            if($pilih['id_karyawan']==$id_karyawan){
  							echo "<option value = '$pilih[id_karyawan]' selected>$pilih[nama]</option>";
  							}else{
  							echo "<option value = '$pilih[id_karyawan]' >$pilih[nama]</option>";
  							}}
					}
					?>
				</select>
    </td>
  </tr>
  <tr>
    <td><label for="tanggal">Tanggal</label> </td>
    <td>&nbsp;:&nbsp;</td>
    <td> <input type="date" name="tanggal" id="tanggal" value="<?= $tanggal; ?>"> </td>
  </tr>
  <tr>
    <td><label for="jam_datang">Jam Datang</label> </td>
    <td>&nbsp;:&nbsp;</td>
    <td> <input type="time" name="jam_datang" id="jam_datang" value="<?= $jamdatang; ?>"></td>
  </tr>
  <tr>
    <td><label for="jam_pulang">Jam Pulang</label> </td>
    <td>&nbsp;:&nbsp;</td>
    <td> <input type="time" name="jam_pulang" id="jam_pulang" value="<?= $jampulang; ?>"></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td><input type="submit" name="submit" value="Tambah">
  </tr>
</table>
<div class="error">
  <?= $error; ?>
</div>
</form>
<script>
               
</body>
<?php require_once 'view/footer.php'; ?>
