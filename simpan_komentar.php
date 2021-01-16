<?php
include "admin/koneksi.php";
$tgl = date("Y-m-d");
mysqli_query($koneksi, "insert into komentar (nama,isi,tgl,id_berita) values
('$_POST[nama]','$_POST[isi]','$tgl','$_POST[id_berita]')");
header('location:index.php?menu=detail_berita&id='.$_POST[id_berita].'');
 ?>
