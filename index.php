<?php
require_once 'core/init.php';
require_once 'view/header.php'; ?>



<h2>Data Karyawan</h2>
<?php
$karyawan = tampilkan_karyawan();
?>
<table border=1px>
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>Jabatan</th>
    <th>No Hp</th>
    <th>Alamat</th>
    <th>Action</th>
  </tr>

<?php
  $no=1;
while($row=mysqli_fetch_assoc($karyawan)) { ?>
  <tr>
  <td><?= $no; ?></td>
  <td><?= $row['nama']; ?></td>
  <td align="center"><?= $row['jenis_kelamin']; ?></td>
  <td><?= $row['jabatan']; ?></td>
  <td><?= $row['nohp']; ?></td>
  <td><?= $row['alamat']; ?></td>
  <td><a href="edit_karyawan.php?id=<?= $row['id_karyawan']; ?>">Edit</a> | <a href="hapus_karyawan.php?id=<?= $row['id_karyawan']; ?>">Hapus</a></td>
  </tr>
  <?php
    $no++;
    }
	?>


</table>
Tambah Data karyawan :
<a href="tambah_karyawan.php"><button>Tambah Data</button></a>
</body>
<?php require_once 'view/footer.php'; ?>
