<?php
error_reporting(0);
include "admin/koneksi.php";
include "function.php";
if($_GET['menu'] == ''){
echo"<h3> Related Post</h3>";
$sql = mysqli_query($koneksi,"select * from berita");
while($data = mysqli_fetch_array($sql)){
echo"
<table>
  <tr>
    <td>
      <img src='admin/berita/$data[foto]' height='150' align='left' hspace='10'>";
      echo substr($data[isi],0,200); echo "... <a href='?menu=detail_berita&id=$data[id_berita]'>... Read More</a>
    </td>
  </tr>
</table>
";
}
echo "<hr>";}

if($_GET['menu'] == 'detail_berita'){
echo"<h3> Detail</h3>";
$sql = mysqli_query($koneksi,"select * from berita where id_berita = '$_GET[id]'");
$data = mysqli_fetch_array($sql);
echo"
<table width='100%'>
  <tr>
    <td>
      <img src='admin/berita/$data[foto]' width='100%'>
    </td>
  </tr>
  <tr>
    <td>
      $data[isi]
    </td>
  </tr>
</table>
";
echo "<hr>";

$sql2 = mysqli_query($koneksi, "select * from komentar where id_berita='$_GET[id]'");
$jumlah = mysqli_num_rows($sql2);
echo "
<h3> KOMENTAR ANDA : ($jumlah) <h3>
<form method='POST' action='simpan_komentar.php'>
<input type='hidden' name='id_berita' value='$data[id_berita]'>
<p>
<input type='text' name='nama' placeholder='isi nama anda' style='width:100%'>
</p>
<p>
<textarea name='isi' placeholder='isi komentar anda' style='width:100%'></textarea>
</p>
<p>
<input type='submit' value='Simpan'>
</p>
</form>
<hr>
";

while ($data2 = mysqli_fetch_array($sql2)){
  echo "<p><b> Nama : ".htmlentities($data2[nama])."</b></p> ";
  echo "<p><b> Komentar : ".htmlentities($data2[isi])."</b></p><hr> ";
}

}

if($_GET['menu'] == 'news'){
echo"<h3>news</h3>
<table>
  <tr>
    <td>
      <img src='' height='150' align='left' hspace='10'>
    </td>
  </tr>
</table>
<hr>
";
}

if($_GET['menu'] == 'category'){
echo"<h3>category</h3>
<table>
  <tr>
    <td>
      <img src='' height='150' align='left' hspace='10'>

    </td>
  </tr>
</table>
<hr>
";
}

if($_GET['menu'] == 'cat'){
  //$var = gantiId($_GET['id']);

echo"<h3>CATEGORY POST ($_GET[id])</h3> <hr>";
$sql = mysqli_query($koneksi,"select * from berita where id_kategori = '$_GET[id]'");
while($data = mysqli_fetch_array($sql)){
echo "
<table>
  <tr>
    <td>
      <a href='?menu=detail_berita&id=$data[id_berita]'><b>$data[judul]</b>
    </td>
  </tr>
</table>
<hr>
";
}
}
 ?>
