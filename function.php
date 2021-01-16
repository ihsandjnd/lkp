<?php
include 'admin/koneksi.php';
function gantiId($id){
$sql = mysqli_query ($koneksi, "select * from kategori where id_kategori = '$id'");
$data = mysqli_fetch_array ($sql);
$nama = $data['nama_kategori'];
return $nama ;
}

echo gantiId();

 ?>
