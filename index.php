<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Welcome to Galli Grounds</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/global.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="js/slides.min.jquery.js"></script>
    <style type="text/css">
      body {
        padding-top: 60px;
      }
      #social{
        
      }
      .span4{
		width:22%;
		text-align:justify;
	}
    </style>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  </head>

  <body>
    <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=280845631994673";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
  <script type="text/javascript">
    (function() {
      var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
      po.src = 'https://apis.google.com/js/plusone.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
    })();
  </script>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	<script>
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true,
				animationStart: function(current){
					$('.caption').animate({
						bottom:-35
					},100);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationStart on slide: ', current);
					};
				},
				animationComplete: function(current){
					$('.caption').animate({
						bottom:0
					},200);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationComplete on slide: ', current);
					};
				},
				slidesLoaded: function() {
					$('.caption').animate({
						bottom:0
					},200);
				}
			});
		});
	</script>
    <div class="topbar">
      <div class="fill">
        <div class="container">
          <a class="brand" href="#">Galli Grounds</a>
          <ul class="nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
          <?php
            //Start session

            
            //Check whether the session variable SESS_MEMBER_ID is present or not
            if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
              ?>
                <form name="loginForm" method="post" action="login-exec.php" class="pull-right">
                  <input class="input-small" type="text" placeholder="Username" name="login" id="login">
                  <input class="input-small" type="password" placeholder="Password" name="password" id="password">
                  <button class="btn" type="submit">Sign in</button>
                </form>
              <?php
            }
            else{
              ?>
                <form class="pull-right">
                  <a class="btn primary" href="logout.php">Logout</a>  
                </form>
              <?php
            }
          ?>          
        </div>
      </div>
    </div>

    <div class="container" style="width:75%">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>Search Less & Play More!</h1>
        <table>
						<tr>
							<td>
							<div id="container">
		<div id="example">
			<!-- <img src="img/new-ribbon.png" width="112" height="112" alt="New Ribbon" id="ribbon"> -->
			<div id="slides">
				<div class="slides_container">
					<div class="slide">
						<a href="#" title="Nearby Cricket Ground" target="_blank"><img src="img/cric1.jpg" width="500" height="270" alt="Slide 1"></a>
						<div class="caption" style="bottom:0">
							<p>Nearby Cricket Ground</p>
						</div>
					</div>
					<div class="slide">
						<a href="#" title="Football Mania in your Locality" target="_blank"><img src="img/foot1.jpg" width="500" height="270" alt="Slide 2"></a>
						<div class="caption">
							<p>Football Mania in your Locality</p>
						</div>
					</div>
					<div class="slide">
						<a href="#" title="Woohoo - Local T20 Match" target="_blank"><img src="img/cric2.jpg" width="500" height="270" alt="Slide 3"></a>
						<div class="caption">
							<p>Woohoo - Local T20 Match</p>
						</div>
					</div>
					<div class="slide">
						<a href="#" title="Keep going guys - Your friends" target="_blank"><img src="img/foot2.jpg" width="500" height="270" alt="Slide 4"></a>
						<div class="caption">
							<p>Keep going guys - Your friends</p>
						</div>
					</div>
					
				</div>
				<a href="#" class="prev"><img src="img/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
				<a href="#" class="next"><img src="img/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
			</div>
			<img src="img/example-frame.png" width="739" height="341" alt="Example Frame" id="frame">
		</div>		
	</div>
							</td>
							<td style="width:360px;vertical-align:middle;text-align:justify;">
							 <p>In many instances, when you have moved to a new place - you might be wondering where exactly is a cricket or football ground nearby. There might be one just in your next lane but you end up spending lot of time finding a place to play your favorite game and less time playing. Sometimes, you may need to travel as there's a known ground somewhere farther.</p>
        
							</td>
						</tr>						
					</table>
        
       <p>Actually, we have a chance to help each other to find grounds in our locality. <em>"Galli Grounds"</em> is a platform where you can <strong>Search</strong> for grounds nearby your place or <strong>Add</strong> a ground you know in your galli (lane/locality)</p>
        <?php

            
            //Check whether the session variable SESS_MEMBER_ID is present or not
            if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
              ?>
                <p><a href="member-index.php" class="btn primary large">Explore It &raquo;</a></p>
              <?php
            }
            else{
              ?>
                <p>
                	<a class="btn primary large" style="width:175px;text-align:center;" href="member-profile.php">Add Grounds in your Galli</a>&nbsp;&nbsp;
                	<a class="btn primary large" style="width:175px;margin-left:25px;text-align:center;" href="member-index.php">View Grounds in your Galli</a>
                </p>
              <?php
            }
          ?>         
      </div>
      
      <!-- Example row of columns -->
      <div class="row">
        <div class="span4">
          <h2>Search</h2>
          <p>This instance has been constantly witnessed a lot of times, where people asks "Where can I find a football ground here?" or "Where do people play cricket in this locality?", Answers were always limited to one individual's knowldge. But now, you can explore knowledge consolidated by many!</p>
          <p><a class="btn" href="member-index.php">Search Grounds &raquo;</a></p>
        </div>
        <div class="span4">
          <h2>Add</h2>
           <p>You are a cool local guy, good sportsperson and might be aware of every lane in your area. Why not help other's to know more about it by just adding a playground with it's details like what kind of games can be played there. That would be helpful for someone who is new to the place </p>
          <p><a class="btn" href="member-profile.php">Add Grounds &raquo;</a></p>
       </div>
        <div class="span4">
          <h2>Authentication</h2>
          <p>Every ground would be added by an authenticated user and it will be verified by our team to maintain the quality of data. This avoids users from running into a lot of spam entries.</p>
          <?php
            //Check whether the session variable SESS_MEMBER_ID is present or not
            if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
              ?>
                <p><a class="btn primary large" style="width:80%;text-align:center;" href="register-form.php">Get Started</a></p>
              <?php
            }
            else{
              ?>
                <p><a class="btn primary large" style="width:80%;text-align:center;" href="member-profile.php">Add Grounds in your Galli</a></p>
              <?php
            }
          ?>        
          
        </div>
         <div class="span4" id="social">
             <h2>Let Others Know</h2>
            <div class="btn  large g-plusone" data-size="medium" data-annotation="inline" data-width="200"></div><br><br>
            <div class="btn  large fb-like" data-href="http://galligrounds.com" data-send="true" data-layout="button_count" data-width="450" data-show-faces="true" data-font="segoe ui"></div><br><br>
            <a href="https://twitter.com/share" class="btn large twitter-share-button" data-text="GalliGrounds - A Social Platform for Finding and Adding playgrounds in your locality" data-via="vamshi4001" data-hashtags="playgrounds">Tweet</a><br><br>            
          </div>
      </div><div style="height:800px;"></div>
      <section id="about">
          <div class="hero-unit" style="margin-top:120px;">
            <h1>About Us</h1><hr>
            <h2>Concept by <a href="http://iosblogger.com">Pradyumna Doddala</a> (Follow on Twitter @<a href="http://twitter.com/pradyumna_d">pradyumna_d</a>)<br>Developed by <a href="http://vamshi.mycollect.in">Vamshi Krishna Reddy</a> (Follow on Twitter @<a href="http://twitter.com/vamshi4001">vamshi4001</a>)</h2>
          </div>
      </section><div style="height:800px;"></div>
      <section id="contact">
        <div class="hero-unit" style="margin-top:120px;">
          <h1>Contact Us</h1>
        </div>
      </section><div style="height:800px;"></div>
      <footer>
        <p>&copy; Galligrounds 2012</p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>
