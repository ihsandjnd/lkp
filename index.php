
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Layout berita</title>
    <link rel="stylesheet" href="stylehead.css">
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
          width: 122px;
          border-right: 1px solid #fff;
          text-align: center;
          padding: 0 15px;
          color: white;
          text-decoration: none;
        }
        .nav li a:hover{
          background-color: brown;
          color: white;
        }
    </style>
  </head>
  <body bgcolor="silver">
    <table border="0" width="800" align="center" cellpadding="4" cellspacing="0" class="table" bgcolor="white">
      <tr bgcolor=#496075>
        <td height="150" align="left" colspan="2">
          <table width="100%">
            <tr>
              <td width="200" align="left">
                <img src="logo.png" height="150" class="images">
              </td>
              <td width="600" align="right" valign="middle">
                <h1> PORTAL BERITA TERBAIK </h1>
                <p id="lowertitle">menurut saya sendiri</p>
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr bgcolor="Silver">
        <td height="40" colspan="2">
          <marquee onmousemove="stop()" onmouseout="start()" behavior="alternate">Welcome</marquee>
        </td>
      </tr>
      <tr bgcolor="white">
        <td height="40" align="center" colspan="2">
          <ul class="nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="?menu=news">News</a></li>
            <li><a href="?menu=category">Category</a></li>
          </ul>
        </td>
      </tr>

      <tr>
        <td height="500" width="600" align="left" bgcolor="white" valign="top">
          <?php
          include"content.php"
           ?>
        </td>
        <td height="500" width="100" align="left" valign="top" bgcolor="white">
          <?php
          include"kanan.php"
          ?>
      <tr bgcolor="aqua">
        <td height="30" align="center" colspan="2">
          <span>copyright &copy; allright reserved !</span>
        </td>
      </tr>
    </table>

  </body>
</html>
