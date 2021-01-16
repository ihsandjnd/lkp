<?php
error_reporting(0);
if($_GET['menu'] == ''){
  echo "<h3>Welcome ".$_SESSION['username']."</h3> <hr> Silahkan Olah Modul Disamping";
}
if($_GET['menu'] == 'user'){
echo "
<h3> Data User :</h3><hr>
<p><button>Tambah</button></p>
<table width='100%' border='1' cellpadding='4' cellspacing='0'>
  <tr bgcolor='silver'>
    <td>Id User</td>
    <td>Username</td>
    <td>Password</td>
    <td>Level Akses</td>
    <td>Edit</td>
    <td>Hapus</td>
  </tr>
";
/*-----------------------------*/
$batas=3;
$halaman= $_GET['halaman'];
if(empty($halaman)){
  $posisi = 0;
  $halaman = 1;
}else {
  $posisi = ($halaman-1) * $batas;
}
$no=1;
$sql = mysqli_query($koneksi,"select * from users order by id_users asc limit $posisi, $batas");
while ($data= mysqli_fetch_array($sql)) {
  if(($no % 2) == '0'){
    $warna='silver';
  }else{
    $warna='white';
  }
echo "
  <tr bgcolor='$warna'>
    <td>".$data['id_users']."</td>
    <td>".$data['username']."</td>
    <td>".$data['password']."</td>
    <td>".$data['level_akses']."</td>
    <td><button>Edit</button></td>
    <td><button>Hapus</button></td>
  </tr>
";
$no++;
}
/*-----------------------------*/
echo "
</table>
<br>
";
$sql2 = mysqli_query($koneksi,"select * from users order by id_users asc");
$query = mysqli_num_rows($sql2);
$jumlah = ceil ($query/$batas);

for($i=1; $i<= $jumlah; $i++){
  if($halaman == $i){
    echo"<b> $i</b>";
  }else{
    echo "<a href='home.php?menu=user&halaman=$i'>$i</a>";
  }
}
}

if($_GET['menu'] == news){
  echo "
  <h3> Data News :</h3><hr>
  <p><a href='?menu=add_berita'><button>Tambah</button></a></p>
  <table width='100%' border='1' cellpadding='4' cellspacing='0'>
    <tr bgcolor='silver'>
      <td>Judul</td>
      <td>Foto</td>
      <td>Isi</td>
      <td>Tanggal</td>
      <td>Edit</td>
      <td>Hapus</td>
    </tr>
  ";
  /*-----------------------------*/
  $batas=3;
  $halaman= $_GET['halaman'];
  if(empty($halaman)){
    $posisi = 0;
    $halaman = 1;
  }else {
    $posisi = ($halaman-1) * $batas;
  }
  $no=1;
  $sql = mysqli_query($koneksi,"select * from berita order by id_berita asc limit $posisi, $batas");
  while ($data= mysqli_fetch_array($sql)) {
    if(($no % 2) == '0'){
      $warna='silver';
    }else{
      $warna='white';
    }
  echo "
    <tr bgcolor='$warna'>
      <td>".$data['judul']."</td>
      <td><img src='berita/".$data['foto']."' width='100'></td>
      <td>".substr($data['isi'],0,100)."...</td>
      <td>".$data['tgl']."</td>
      <td><a href='?menu=edit_berita&id=$data[id_berita]'><button>Edit</button></a></td>
      <td><a href='aksi.php?act=delete&id=$data[id_berita]&foto=$data[foto]'><button>Hapus</button></a></td>
    </tr>
  ";
  $no++;
  }
  /*-----------------------------*/
  echo "
  </table>
  <br>
  ";
  $sql2 = mysqli_query($koneksi,"select * from berita order by id_berita asc");
  $query = mysqli_num_rows($sql2);
  $jumlah = ceil ($query/$batas);

  for($i=1; $i<= $jumlah; $i++){
    if($halaman == $i){
      echo"<b> $i</b>";
    }else{
      echo "<a href='home.php?menu=news&halaman=$i'>$i</a>";
    }
  }
}

if($_GET['menu'] == add_berita){
  echo "<h3>Add Berita</h3><hr><br>";
  echo "<form method='POST' action='aksi.php?act=add_berita' enctype='multipart/form-data'>
  <table width='100%'>
  <tr>
  <td> Judul </td> <td> <input type='text' name='judul'></td>
  </tr>
  <tr>
  <td> Foto </td> <td> <input type='file' name='foto'></td>
  </tr>
  <tr>
  <td> Isi </td> <td> <textarea name='isi' cols='50' rows='10'></textarea></td>
  </tr>
  <tr>
  <td> Kategori </td>
  <td> <select name='id_kategori'>
  ";
  $a =  mysqli_query($koneksi, "select * from kategori");
  while ($d = mysqli_fetch_array($a)) {
    echo "<option value='$d[id_kategori]'>$d[nama_kategori] </option>";
  }
  echo "</select>
  </td>
  </tr>

  <tr>
  <td></td> <td> <input type='submit' value='Simpan'></td>
  </tr>
  </table>
  </form>
  ";
}

if($_GET['menu'] == edit_berita){
$data = mysqli_fetch_array(mysqli_query($koneksi,"select * from berita where id_berita = '$_GET[id]'"));
  echo "<h3>Edit Berita</h3><hr><br>";
  echo "<form method='POST' action='aksi.php?act=edit_berita' enctype='multipart/form-data'>
  <input type='hidden' name='id_berita' value='$data[id_berita]'>
  <table width='100%'>
  <tr>
  <td> Judul </td> <td> <input type='text' name='judul' value='$data[judul]'></td>
  </tr>
  <tr>
  <td> Foto </td> <td> <img src='berita/$data[foto]'></td>
  </tr>
  <tr>
  <td> Foto </td> <td> <input type='file' name='foto'></td>
  </tr>
  <tr>
  <td> Isi </td> <td> <textarea name='isi' cols='50' rows='10' >$data[isi]</textarea></td>
  </tr>
  <tr>
  <td> Kategori </td>
  <td> <select name='id_kategori'>
  ";
  $a =  mysqli_query($koneksi, "select * from kategori");
  while ($d = mysqli_fetch_array($a)) {
    if($d[id_kategori] == $data[id_kategori]){
    echo "<option value='$d[id_kategori]' selected >$d[nama_kategori] </option>";
  } else {
    echo "<option value='$d[id_kategori]' >$d[nama_kategori] </option>";
  }
  }
  echo "</select>
  </td>
  </tr>

  <tr>
  <td></td> <td> <input type='submit' value='Simpan'></td>
  </tr>
  </table>
  </form>
  ";
}

if($_GET['menu'] == category){
  echo "
  <h3> Data Kategori :</h3><hr>
  <p><a href='?menu=add_kategori'><button>Tambah</button></a></p>
  <table width='100%' border='1' cellpadding='4' cellspacing='0'>
    <tr bgcolor='silver'>
      <td>ID Kategori</td>
      <td>Nama Kategori</td>
      <td>Edit</td>
      <td>Hapus</td>
    </tr>
  ";
  /*-----------------------------*/
  $batas=3;
  $halaman= $_GET['halaman'];
  if(empty($halaman)){
    $posisi = 0;
    $halaman = 1;
  }else {
    $posisi = ($halaman-1) * $batas;
  }
  $no=1;
  $sql = mysqli_query($koneksi,"select * from kategori order by id_kategori asc limit $posisi, $batas");
  while ($data= mysqli_fetch_array($sql)) {
    if(($no % 2) == '0'){
      $warna='silver';
    }else{
      $warna='white';
    }
  echo "
    <tr bgcolor='$warna'>
      <td>".$data['id_kategori']."</td>
      <td>".$data['nama_kategori']."</td>
      <td><a href='?menu=edit_kategori&id=$data[id_kategori]'><button>Edit</button></a></td>
      <td><a href='aksi.php?act=delete_kategori&id=$data[id_kategori]'><button>Hapus</button></a></td>
    </tr>
  ";
  $no++;
  }
  /*-----------------------------*/
  echo "
  </table>
  <br>
  ";
  $sql2 = mysqli_query($koneksi,"select * from kategori order by id_kategori asc");
  $query = mysqli_num_rows($sql2);
  $jumlah = ceil ($query/$batas);

  for($i=1; $i<= $jumlah; $i++){
    if($halaman == $i){
      echo"<b> $i</b>";
    }else{
      echo "<a href='home.php?menu=category&halaman=$i'>$i</a>";
    }
  }

}

if($_GET['menu'] == add_kategori){
  echo "<h3>Add Kategori</h3><hr><br>";
  echo "<form method='POST' action='aksi.php?act=add_kategori' enctype='multipart/form-data'>
  <table width='100%'>
  <tr>
  <td> Nama Kategori </td> <td> <input type='text' name='nama_kat'></td>
  </tr>
  <tr>
  <td></td> <td> <input type='submit' value='Simpan'></td>
  </tr>
  </table>
  </form>
  ";
}

if($_GET['menu'] == edit_kategori){
$data = mysqli_fetch_array(mysqli_query($koneksi,"select * from kategori where id_kategori = '$_GET[id]'"));
  echo "<h3>Edit Berita</h3><hr><br>";
  echo "<form method='POST' action='aksi.php?act=edit_kategori' enctype='multipart/form-data'>
  <input type='hidden' name='id_kategori' value='$data[id_berita]'>
  <table width='100%'>
  <tr>
  <td> Nama Kategori </td> <td> <input type='text' name='nama_kat' value='$data[nama_kategori]'></td>
  <tr>
  <td></td> <td> <input type='submit' value='Simpan'></td>
  </tr>
  </table>
  </form>
  ";
}

if($_GET['menu'] == comment){
  echo "
  <h3> Data Komentar :</h3><hr>
  <table width='100%' border='1' cellpadding='4' cellspacing='0'>
    <tr bgcolor='silver'>
      <td>ID Komentar</td>
      <td>Nama</td>
      <td>Isi</td>
      <td>Tanggal</td>
      <td>Hapus</td>
    </tr>
  ";
  $batas=3;
  $halaman= $_GET['halaman'];
  if(empty($halaman)){
    $posisi = 0;
    $halaman = 1;
  }else {
    $posisi = ($halaman-1) * $batas;
  }
  $no=1;
  $sql = mysqli_query($koneksi,"select * from komentar order by id_komentar asc limit $posisi, $batas");
  while ($data= mysqli_fetch_array($sql)) {
    if(($no % 2) == '0'){
      $warna='silver';
    }else{
      $warna='white';
    }
  echo "
    <tr bgcolor='$warna'>
      <td>".$data['id_komentar']."</td>
      <td>".$data['nama']."</td>
      <td>".$data['isi']."</td>
      <td>".$data['tgl']."</td>
      <td><a href='aksi.php?act=delete_komen&id=$data[id_komentar]'><button>Hapus</button></a></td>
    </tr>
  ";
  $no++;
  }
  echo "
  </table>
  <br>
  ";
  $sql2 = mysqli_query($koneksi,"select * from komentar order by id_komentar asc");
  $query = mysqli_num_rows($sql2);
  $jumlah = ceil ($query/$batas);

  for($i=1; $i<= $jumlah; $i++){
    if($halaman == $i){
      echo"<b> $i</b>";
    }else{
      echo "<a href='home.php?menu=comment&halaman=$i'>$i</a>";
    }
  }
}
 ?>
