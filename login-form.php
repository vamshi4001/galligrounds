<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Form</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
      }
      table td{
        border-top: 0px;
      }
    </style>
</head>
<body>
  <div class="topbar">
      <div class="fill">
        <div class="container">
          <a class="brand" href="index.php">Galli Grounds</a>
          <ul class="nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
          <form name="loginForm" method="post" action="login-exec.php" class="pull-right">
            <input class="input-small" type="text" placeholder="Username" name="login" id="login">
            <input class="input-small" type="password" placeholder="Password" name="password" id="password">
            <button class="btn" type="submit">Sign in</button>
          </form>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="hero-unit">
        <h4>Already Have an Account - Login</h4>
      <form id="loginForm" name="loginForm" method="post" action="login-exec.php">
        <table style="width:300px;margin-left:auto;margin-right:auto;" border="0" align="center" cellpadding="2" cellspacing="0">
          <tr>
            <td width="112"><b>Login</b></td>
            <td width="188"><input name="login" type="text" class="textfield" id="login" /></td>
          </tr>
          <tr>
            <td><b>Password</b></td>
            <td><input name="password" type="password" class="textfield" id="password" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><center><input class="btn primary" type="submit" name="Submit" value="Login" /></center></td>
          </tr>
        </table>
      </form>
    </div>
        <h4 align="center" class="err">
          Don't have an account? <br/><a style="width:80px;text-align:center;" class="btn primary large" href="register-form.php">Register &raquo;</a>
        </h4>
      </div>
    </div>
    <footer>
        <p>&copy; Galligrounds 2012</p>
    </footer>
</body>
</html>
