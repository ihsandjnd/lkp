<?php
error_reporting(0);
ob_start();
session_start();
include "koneksi.php";

$user = htmlentities($_POST ['username']);
$pass = htmlentities(md5($_POST ['password']));

$sql = mysqli_query($koneksi, "select * from users where username = '".$user."' and password = '".$pass."'");

$data = mysqli_fetch_array($sql);

$cek = mysqli_num_rows($sql);

if($cek > 0){


  $_SESSION['id_users'] = $data['id_users'];
  $_SESSION['username'] = $data['username'];
  $_SESSION['level_akses'] = $data['level_akses'];
  $_SESSION['password'] = $data['password'];
  header('location:home.php');
  //echo"<script>window.location='home.php'</script>";
}else {
  echo "<h3> Login Error</h3> <hr>";
  mysqli_error($sql);
}
 ?>
