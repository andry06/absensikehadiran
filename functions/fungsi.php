<?php

function tampilkan_karyawan(){
  global $koneksi;


  $query = "SELECT * FROM karyawan";
  $result = mysqli_query($koneksi, $query) or die('gagal menampilkan data');

  return $result;
}

function tampilkan_karyawan_id($id){
  global $koneksi;


  $query = "SELECT * FROM karyawan WHERE id_karyawan='$id'";
  $result = mysqli_query($koneksi, $query) or die('gagal menampilkan data');

  return $result;
}

function tambah_data_karyawan($nama, $jenis_kelamin, $jabatan, $nohp, $alamat){
  $query = "INSERT INTO karyawan(nama, jenis_kelamin, jabatan, nohp, alamat)
  VALUES ('$nama', '$jenis_kelamin', '$jabatan', '$nohp', '$alamat')";
  return run($query);
}

function hapus_data_karyawan($id){
  $query = "DELETE FROM karyawan where id_karyawan='$id'";
  return run($query);
}

function edit_data_karyawan($nama, $jenis_kelamin, $jabatan, $nohp, $alamat, $id){
  $query = "UPDATE karyawan SET nama='$nama', jenis_kelamin='$jenis_kelamin', jabatan='$jabatan',
  nohp='$nohp', alamat='$alamat' WHERE id_karyawan=$id";
  return run($query);
}

// Kehadiran

function tampilkan_kehadiran(){
  global $koneksi;


  $query = "SELECT * FROM kehadiran join karyawan on kehadiran.id_karyawan=karyawan.id_karyawan";
  $result = mysqli_query($koneksi, $query) or die('gagal menampilkan data');

  return $result;
}

function tambah_data_kehadiran($id_karyawan, $tanggal, $jamdatang, $jampulang){
  $query = "INSERT INTO kehadiran(id_karyawan, tanggal, jam_datang, jam_pulang)
  VALUES ('$id_karyawan', '$tanggal', '$jamdatang', '$jampulang')";
  return run($query);
}

function hapus_data_kehadiran($id){
  $query = "DELETE FROM kehadiran where id_kehadiran=$id";
  return run($query);
}

function tampilkan_kehadiran_id($id){
  global $koneksi;


  $query = "SELECT * FROM kehadiran join karyawan on kehadiran.id_karyawan=karyawan.id_karyawan WHERE id_kehadiran=$id";
  $result = mysqli_query($koneksi, $query) or die('gagal menampilkan data');

  return $result;
}

function edit_data_kehadiran($id_karyawan, $tanggal, $jamdatang, $jampulang, $id){
  $query = "UPDATE kehadiran SET id_karyawan='$id_karyawan', tanggal='$tanggal', jam_datang='$jamdatang',
  jam_pulang='$jampulang' WHERE id_kehadiran=$id";
  return run($query);
}

function run($query){
  global $koneksi;

  if(mysqli_query($koneksi, $query)) return true;
  else return false;
}

//tanggal indonesia


function tanggal_indo($tanggal, $cetak_hari = false)
{
$hari = array ( 1 =>    'Senin',
    'Selasa',
    'Rabu',
    'Kamis',
    'Jumat',
    'Sabtu',
    'Minggu'
  );

$bulan = array (1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
$split 	  = explode('-', $tanggal);
$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

if ($cetak_hari) {
$num = date('N', strtotime($tanggal));
return $hari[$num] . ', ' . $tgl_indo;
}
return $tgl_indo;
}

 ?>
