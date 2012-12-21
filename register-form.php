<?php
	session_start();
?>
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
      table tbody th{
        border-top: 0px;
      }
      .container{
        width:76% !important;

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
      <?php
                  if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
                    echo '<ul class="err">';
                    echo '<li style="font-weight:bold;list-style-type:none;">Errors</li>';
                    foreach($_SESSION['ERRMSG_ARR'] as $msg) {
                      echo '<li>',$msg,'</li>'; 
                    }
                    echo '</ul>';
                    unset($_SESSION['ERRMSG_ARR']);
                  }
                ?>
      <table>
        <tr>
          <td>
            <div class="hero-unit">
              <center><h4>Already Have an Account? - Login</h4></center><hr></center>
              <form id="loginForm" name="loginForm" method="post" action="login-exec.php">
                <table style="width:300px;margin-left:auto;margin-right:auto;" border="0" align="center" cellpadding="2" cellspacing="0">
                  <tr>
                    <td width="112"><b>Username<span style="color:red">*</span></b></td>
                    <td width="188"><input name="login" type="text" class="textfield" id="login" /></td>
                  </tr>
                  <tr>
                    <td><b>Password<span style="color:red">*</span></b></td>
                    <td><input name="password" type="password" class="textfield" id="password" /></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><center><input class="btn primary" type="submit" name="Submit" value="Login" /></center></td>
                  </tr>
                </table>
              </form>
            </div>
          </td>
          <td>
            <div class="hero-unit">
                <center><h4>Don't Have an Account? - Register</h4></center><hr></center>
                <?php
                  if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
                    echo '<ul class="err">';
                    foreach($_SESSION['ERRMSG_ARR'] as $msg) {
                      echo '<li>',$msg,'</li>'; 
                    }
                    echo '</ul>';
                    unset($_SESSION['ERRMSG_ARR']);
                  }
                ?>
                <form id="loginForm" name="loginForm" method="post" action="register-exec.php">
                  <table style="width:500px;margin-left:auto;margin-right:auto;" border="0" align="center" cellpadding="2" cellspacing="0">
                    <tr>
                      <th>First Name <span style="color:red">*</span></th>
                      <td><input name="fname" type="text" class="textfield" id="fname" /></td>
                    </tr>
                    <tr>
                      <th>Last Name <span style="color:red">*</span></th>
                      <td><input name="lname" type="text" class="textfield" id="lname" /></td>
                    </tr>
                    <tr>
                      <th width="124">Username <span style="color:red">*</span></th>
                      <td width="168"><input name="login" type="text" class="textfield" id="login" /></td>
                    </tr>
                    <tr>
                      <th>Password <span style="color:red">*</span></th>
                      <td><input name="password" type="password" class="textfield" id="password" /></td>
                    </tr>
                    <tr>
                      <th>Confirm Password <span style="color:red">*</span></th>
                      <td><input name="cpassword" type="password" class="textfield" id="cpassword" /></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><input class="btn primary" type="submit" name="Submit" value="Register" /></td>
                    </tr>
                  </table>
                </form>
            </div>                
          </td>
        </tr>
      </table>
    <footer>
        <p>&copy; Galligrounds 2012</p>
    </footer>
</body>
</html>
