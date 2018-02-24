<?php
require_once 'core/init.php';
require_once 'view/header.php'; ?>

<h2>Edit Data Karyawan</h2>
<?php
$error='';
$id = $_GET['id'];

if(isset($_GET['id'])){
  $satukaryawan = tampilkan_karyawan_id($id);
  while ($row = mysqli_fetch_assoc($satukaryawan)) {
    $nama = $row['nama'];
    $jenis_kelamin = $row['jenis_kelamin'];
    $jabatan = $row['jabatan'];
    $nohp = $row['nohp'];
    $alamat = $row['alamat'];
  }

}
if(isset($_POST['submit'])){
  $nama          = $_POST['nama'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $jabatan       = $_POST['jabatan'];
  $nohp          = $_POST['nohp'];
  $alamat        = $_POST['alamat'];

  if(!empty(trim($nama)) && !empty(trim($jenis_kelamin)) && !empty(trim($jabatan)) && !empty(trim($nohp)) && !empty(trim($alamat))){

    if(edit_data_karyawan($nama, $jenis_kelamin, $jabatan, $nohp, $alamat, $id)){
      header('Location: index.php');
    } else {
      $error = 'Ada masalah saat menambah data';
    }
  }else{
     $error='Judul Wajib di isi';
  }
}
 ?>

<form action="" method="POST">
<table class="karyawan">
  <tr>
    <td><label for="nama">Nama</label></td>
    <td>&nbsp;:&nbsp;</td>
    <td><input type="text" name="nama" id="nama" value="<?=$nama; ?>"></td>
  </tr>
  <tr>
    <td><label for="jenis_kelamin">Jenis Kelamin</label> </td>
    <td>&nbsp;:&nbsp;</td>
    <td>
      <select class="" name="jenis_kelamin" id="jenis_kelamin">
        <option value="">Pilih Jenis Kelamin</option>
        <option value="pria" <?php if($jenis_kelamin == 'pria'){ echo 'selected'; } ?>>Pria</option>
        <option value="wanita" <?php if($jenis_kelamin == 'wanita'){ echo 'selected'; } ?>>Wanita</option>
      </select>
      </td>
  </tr>
  <tr>
    <td><label for="jabatan">Jabatan</label> </td>
    <td>&nbsp;:&nbsp;</td>
    <td> <input type="text" name="jabatan" id="jabatan" value="<?=$jabatan; ?>"></td>
  </tr>
  <tr>
    <td><label for="nohp">No Hp</label> </td>
    <td>&nbsp;:&nbsp;</td>
    <td> <input type="text" name="nohp" id="nohp" value="<?=$nohp; ?>"></td>
  </tr>
  <tr>
    <td><label for="alamat">Alamat</label> </td>
    <td>&nbsp;:&nbsp;</td>
    <td> <input type="text" name="alamat" id="alamat"  size="40" value="<?=$alamat; ?>"></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td><input type="submit" name="submit" value="Simpan">
  </tr>
</table>
<div class="error">
  <?= $error; ?>
</div>
</form>
</body>
<?php require_once 'view/footer.php'; ?>
