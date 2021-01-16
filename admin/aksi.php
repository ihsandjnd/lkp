<?php
session_start();
include"koneksi.php";

if($_GET['act'] == 'add_berita'){
  $lokasi_file = $_FILES['foto']['tmp_name'];
  $nama_file = $_FILES['foto']['name'];

  if(!empty($lokasi_file)){
    move_uploaded_file($lokasi_file, "berita/$nama_file");
    mysqli_query($koneksi, "insert into berita (id_berita,judul,foto,isi,tgl,id_users,id_kategori,id_komentar) values
    ('$_POST[id_berita]','$_POST[judul]','$nama_file','$_POST[isi]','$tgl','$_SESSION[id_users]','$_POST[id_kategori]','0')");
  } else {
    mysqli_query($koneksi, "insert into berita (id_berita,judul,isi,tgl,id_users,id_kategori,id_komentar) values
    ('$_POST[id_berita]','$_POST[judul]','$_POST[isi]','$tgl','$_SESSION[id_users]','$_POST[id_kategori]','0')");
  }
  header('location:home.php?menu=news');
}

if($_GET['act'] == 'delete'){
  mysqli_query($koneksi,"delete from berita where id_berita='$_GET[id]'");
  unlink("berita/$_GET[foto]");
  header('location:home.php?menu=news');
}

if($_GET['act'] == 'edit_berita'){
  $lokasi_file = $_FILES['foto']['tmp_name'];
  $nama_file = $_FILES['foto']['name'];

  if(!empty($lokasi_file)){
    move_uploaded_file($lokasi_file, "berita/$nama_file");
    mysqli_query($koneksi, "update berita set id_berita='$_POST[id_berita]',judul='$_POST[judul]',foto='$nama_file',isi='$_POST[isi]',tgl='$tgl',id_users='$_SESSION[id_users]',id_kategori='$_POST[id_kategori]',id_komentar='0' where id_berita='$_POST[id_berita]'");
  } else {
    mysqli_query($koneksi, "update berita set id_berita='$_POST[id_berita]',judul='$_POST[judul]',isi='$_POST[isi]',tgl='$tgl',id_users='$_SESSION[id_users]',id_kategori='$_POST[id_kategori]',id_komentar='0' where id_berita='$_POST[id_berita]'");
  }
  header('location:home.php?menu=news');
}

if($_GET['act'] == 'add_kategori'){
    mysqli_query($koneksi, "insert into kategori (id_kategori,nama_kategori) values
    ('$_POST[id_kategori]','$_POST[nama_kat]')");
    header('location:home.php?menu=category');
    }

if($_GET['act'] == 'edit_kategori'){
    mysqli_query($koneksi, "update berita set id_kategori='$_POST[id_kategori]',nama_kategori='$_POST[nama_kat]' where id_kategori='$_POST[id_kategori]'");
      header('location:home.php?menu=category');
    }

if($_GET['act'] == 'delete_kategori'){
    mysqli_query($koneksi,"delete from kategori where id_kategori='$_GET[id_kategori]'");
    header('location:home.php?menu=category');}

if($_GET['act'] == 'delete_komen'){
    mysqli_query($koneksi,"delete from komentar where id_komentar='$_GET[id]'");
    header('location:home.php?menu=comment');}
 ?>
