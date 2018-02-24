<?php
require_once 'core/init.php';
require_once 'view/header.php'; ?>

<h2>Tambah Data Karyawan</h2>
<?php
$error='';

if(isset($_POST['submit'])){
  $nama          = $_POST['nama'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $jabatan       = $_POST['jabatan'];
  $nohp          = $_POST['nohp'];
  $alamat        = $_POST['alamat'];

  if(!empty(trim($nama)) && !empty(trim($jenis_kelamin)) && !empty(trim($jabatan)) && !empty(trim($nohp)) && !empty(trim($alamat))){

    if(tambah_data_karyawan($nama, $jenis_kelamin, $jabatan, $nohp, $alamat)){
      header('Location: index.php');
    } else {
      $error = 'Ada masalah saat menambah data';
    }
  }else{
      $error='Ada data yang masih kosong, wajib di isi semua';
  }
}
 ?>

<form action="" method="POST">
<table class="karyawan">
  <tr>
    <td><label for="nama">Nama</label></td>
    <td>&nbsp;:&nbsp;</td>
    <td><input type="text" name="nama" id="nama"></td>
  </tr>
  <tr>
    <td><label for="jenis_kelamin">Jenis Kelamin</label> </td>
    <td>&nbsp;:&nbsp;</td>
    <td> <select name="jenis_kelamin" id="jenis_kelamin">
      <option value="pria">Pria</option>
      <option value="wanita">Wanita</option>
    </select></td>
  </tr>
  <tr>
    <td><label for="jabatan">Jabatan</label> </td>
    <td>&nbsp;:&nbsp;</td>
    <td> <input type="text" name="jabatan" id="jabatan"></td>
  </tr>
  <tr>
    <td><label for="nohp">No Hp</label> </td>
    <td>&nbsp;:&nbsp;</td>
    <td> <input type="text" name="nohp" id="nohp"></td>
  </tr>
  <tr>
    <td><label for="alamat">Alamat</label> </td>
    <td>&nbsp;:&nbsp;</td>
    <td> <input type="text" name="alamat" id="alamat"></td>
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
</body>
<?php require_once 'view/footer.php'; ?>
