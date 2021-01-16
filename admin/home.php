<?php
error_reporting(0);
session_start();
include "koneksi.php";
if(empty($_SESSION['username'])){
  echo "<h3 align='center'>Maaf Anda Tidak Boleh Akses Langsung</h3>";
}else{
 ?>
<html>
  <head>
    <title>:: Dashboard ::</title>
    <style>
      .table{
        border-radius: 10px;
        border: 1px solid #000 ;
        padding: 10px;
        box-shadow: 5px 5px 5px #000 ;
        color: black;
        font-weight: bold;
      }
      .nav{
          list-style: none;
          margin: 0px;
          padding: 0px;
          background-color: #006699;
          color: white;
        }
      .nav li{
          margin: 0px;
          padding: 0px;

        }
      .nav li a{
          background-color: #006699;
          line-height: 2.5;
          border: 1px solid #fff;
          float: left;
          width: 100px;
          border-right: 1px solid #fff;
          text-align: left;
          padding: 0 15px;
          color: white;
          text-decoration: none;
          font-weight: bold;
        }
        .nav li a:hover{
          background-color: brown;
          color: white;
        }
    </style>
  </head>
  <body bgcolor="silver">
    <table width="800" border="0" cellpadding="8" cellspacing="0" align="center" bgcolor="white" class="table">
      <tr>
        <td height="200" colspan="2" align="center"><img src="asset/head.png"></td>
      </tr>
      <tr>
        <td height="30" colspan="2" align="right"><a href="logout.php" onClick="return confirm('Yakin ingin keluar ???')"><button>Logout</button></a></td>
      </tr>
      <tr>
        <td width="200" align="left" valign="top">
          <ul class="nav">
            <li><a href="home.php">Home</a></li>
            <li><a href="?menu=news">News</a></li>
            <li><a href="?menu=category">Category</a></li>
            <li><a href="?menu=user">User</a></li>
            <li><a href="?menu=comment">Comment</a></li>
          </ul>
        </td>
        <td width="600" align="left" valign="top"><?php include"content_admin.php"; ?></td>
      </tr>
      <tr>
        <td height="30" colspan="2" align="center" bgcolor="silver">Footer</td>
      </tr>
    </table>
  </body>
</html>
<?php } ?>
