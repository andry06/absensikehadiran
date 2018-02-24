<?php require_once "core/init.php";

if(isset($_GET['id'])){
  if(hapus_data_kehadiran($_GET['id'])) {
    header('Location: kehadiran.php');
  }else{
  echo "gagal menghapus data";
  }
}
