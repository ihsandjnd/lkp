<?php
include"admin/koneksi.php";
echo "<h3> Kategori Post</h3>";
$sql= mysqli_query($koneksi, "select * from kategori");
echo "<ul>";
while($data = mysqli_fetch_array($sql)){
  echo "<li><a href='?menu=cat&id=$data[id_kategori]'>$data[nama_kategori]</li>";
}
echo "</ul>";
 ?>
