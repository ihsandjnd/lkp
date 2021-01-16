<!DOCTYPE html>
<html>
  <head>
    <title>:: Login ::</title>
    <style>
      .table{
        border-radius: 10px;
        border: 1px solid #000 ;
        padding: 10px;
        box-shadow: 5px 5px 5px #000 ;
      }
      input{
        padding: 5px;
      }
    </style>
  </head>
  <body bgcolor="silver">
    <h3 align="center">:: Welcome Back ::</h3>
    <form action="cek_login.php" method="post">
    <table border="0" cellpadding="8" cellspacing="0" align="center" bgcolor="white" class="table">
      <tr>
        <td>Username</td> <td><input type="text" name="username" placeholder="username"></td>
      </tr>
      <tr>
        <td>Password</td> <td><input type="password" name="password" placeholder="password"></td>
      </tr>
      <tr>
        <td></td> <td><input type="submit" value="login"> <input type="reset" value="reset"></td>
      </tr>
    </table>
  </form>
  </body>
</html>
