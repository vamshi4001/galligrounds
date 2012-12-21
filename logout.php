<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Logged Out</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
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
  	    	<h1 align="center">You have been logged out.</h1>
  			<p align="center">&nbsp;</p>
  			<h4 align="center" class="err">
  			  Login to continue exploring.<br/><a style="width:70px;text-align:center;" class="btn primary large" href="register-form.php">Sign In &raquo;</a>
  			</h4>
  		</div>
    </div>
    <footer>
        <p>&copy; Galligrounds 2012</p>
    </footer>
</body>
</html>
