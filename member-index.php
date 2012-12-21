<?php session_start(); ?>
<?php
//	require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Member Index</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script src="js/jquery-ui-1.8.23.custom.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>    
    <script type="text/javascript">
        var map;
        var cricArr = [];var fbArr = [];var basketArr = [];var baseArr = [];var volleyArr = [];var shuttleArr = [];var tennisArr = [];var runningArr = [];
            var kabaddiArr = [];var khoArr = [];var hockeyArr = [];var swimArr = [];var golfArr = [];var othersArr = [];

        var markersArray = [];
		var infowindow;
        function initMap()
        {
            if (navigator.geolocation) {
                // Use method getCurrentPosition to get coordinates
                navigator.geolocation.getCurrentPosition(function (position) {
                    // Access them accordingly
                    //alert(position.coords.latitude + ", " + position.coords.longitude);
                    var latlng = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
                    var myOptions = {
                        zoom: 10,
                        center: latlng,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                    $.ajax({
	                    type: "GET",
	                    url: "getGrounds.php",
	                    success: function(data){
	                    	for(var i=0;i<data.grounds.length;i++){
	                        	placeMarker(data.grounds[i]);
	                        	hashMaker(data.grounds[i]);	                        	
	                        }
	                                                                
	                    },
	                    complete: fillButtons
	                });                     
                    // add a click event handler to the map object
                    // google.maps.event.addListener(map, "click", function(event)
                    // {
                    //     // place a marker
                    //     placeMarker(event.latLng);

                    //     // display the lat/lng in your form's lat/lng fields
                    //     document.getElementById("latFld").value = event.latLng.lat().toFixed(6);
                    //     document.getElementById("lngFld").value = event.latLng.lng().toFixed(6);
                    //     $('#status').attr('src','images/yes.png');
                    //     $('#select').text("Location Selected");
                    // });
                    // Check for geolocation support
                },
                function(err){
                    var latlng = new google.maps.LatLng(17.85329,77.864502);
                    var myOptions = {
                        zoom: 5,
                        center: latlng,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                    $.ajax({
                    type: "GET",
                    url: "getGrounds.php",
                    success: function(data){
                    	for(var i=0;i<data.grounds.length;i++){
                        	placeMarker(data.grounds[i]);
                        	hashMaker(data.grounds[i]);	                        	
                        }                                                          
                    }
                });
                });                 
            }
        }
        function hashMaker(groundData){ 
            switch(groundData.ground.sport){                
                case "Cricket": cricArr.push(groundData);
                    break;
                case "Football": fbArr.push(groundData);
                    break;
                case "Basket Ball": basketArr.push(groundData);
                    break;
                case "Base Ball": baseArr.push(groundData);
                    break;
                case "Volley Ball": volleyArr.push(groundData);
                    break;
                case "Badminton": shuttleArr.push(groundData);
                    break;
                case "Tennis": tennisArr.push(groundData);
                    break;
                case "Running": runningArr.push(groundData);
                    break;
                case "Kabaddi": kabaddiArr.push(groundData);
                    break;
                case "Kho Kho": khoArr.push(groundData);
                    break;
                case "Swimming": swimArr.push(groundData);
                    break;
                case "Others": othersArr.push(groundData);
                    break;
                case "Hockey": hockeyArr.push(groundData);
                    break;
                case "Golf": golfArr.push(groundData);
                    break;
                default: othersArr.push(groundData);
                    break;               
            }
            
        }
        function placeMarker(groundData) {
            // first remove all markers if there are any
			// deleteOverlays();
			var ground_latlng = new google.maps.LatLng(groundData.ground.latitude, groundData.ground.longitude);
            var marker = new google.maps.Marker({
                position: ground_latlng, 
                map: map
            });
            var locality = (groundData.ground.area!="")?groundData.ground.area+", ":""
            var boxText = 	groundData.ground.sport+" ground, "
                                        					+locality
                                        					+groundData.ground.place+", <br>"
                                        					+groundData.ground.state+", "+groundData.ground.country;                                        					

			google.maps.event.addListener(marker, 'click', function(event) {
				if(infowindow) {
					infowindow.close();
				}
	            infowindow =  new google.maps.InfoWindow({
					content: boxText
				});
				infowindow.setPosition(event.latLng);
				infowindow.open(map,marker);
			});
            // add marker in markers array
            markersArray.push(marker);
            //map.setCenter(location);
        }

        // Deletes all markers in the array by removing references to them
        function deleteOverlays() {
            if (markersArray) {
                for (i in markersArray) {
                    markersArray[i].setMap(null);
                }
            markersArray.length = 0;
            }
        }
        function fillButtons(){
        		$("#cricket").text("Cricket ("+cricArr.length+")");
			$("#football").text("Football ("+fbArr.length+")");
			$("#basketball").text("Basket Ball ("+basketArr.length+")");
			$("#baseball").text("Base ball ("+baseArr.length+")");
			$("#volleyball").text("Volley Ball ("+volleyArr.length+")");
			$("#badminton").text("Badminton ("+shuttleArr.length+")");
			$("#tennis").text("Tennis ("+tennisArr.length+")");
			$("#running").text("Running ("+runningArr.length+")");
			$("#kabaddi").text("Kabaddi ("+kabaddiArr.length+")");
			$("#khokho").text("Kho Kho ("+khoArr.length+")");
			$("#hockey").text("Hockey ("+hockeyArr.length+")");
			$("#swimming").text("Swimming ("+swimArr.length+")");
			$("#golf").text("Golf ("+golfArr.length+")");
			$("#others").text("Others ("+othersArr.length+")");
        }
       $(function(){
       	   $('#cricket').click(function(){
        	deleteOverlays();
        	for(var i=0;i<cricArr.length;i++){
        		placeMarker(cricArr[i]);
        	}
           });
           $('#football').click(function(){
        	deleteOverlays();
        	for(var i=0;i<fbArr.length;i++){
        		placeMarker(fbArr[i]);
        	}
           });
           $('#basketball').click(function(){
        	deleteOverlays();
        	for(var i=0;i<basketArr.length;i++){
        		placeMarker(basketArr[i]);
        	}
           });
           $('#baseball').click(function(){
        	deleteOverlays();
        	for(var i=0;i<baseArr.length;i++){
        		placeMarker(baseArr[i]);
        	}
           });
           $('#volleyball').click(function(){
        	deleteOverlays();
        	for(var i=0;i<volleyArr.length;i++){
        		placeMarker(volleyArr[i]);
        	}
           });
           $('#badminton').click(function(){
        	deleteOverlays();
        	for(var i=0;i<shuttleArr.length;i++){
        		placeMarker(shuttleArr[i]);
        	}
           });
           $('#tennis').click(function(){
        	deleteOverlays();
        	for(var i=0;i<tennisArr.length;i++){
        		placeMarker(tennisArr[i]);
        	}
           });
           $('#running').click(function(){
        	deleteOverlays();
        	for(var i=0;i<runningArr.length;i++){
        		placeMarker(runningArr[i]);
        	}
           });
           $('#kabaddi').click(function(){
        	deleteOverlays();
        	for(var i=0;i<kabaddiArr.length;i++){
        		placeMarker(kabaddiArr[i]);
        	}
           });
           $('#khokho').click(function(){
        	deleteOverlays();
        	for(var i=0;i<khoArr.length;i++){
        		placeMarker(khoArr[i]);
        	}
           });
           $('#hockey').click(function(){
        	deleteOverlays();
        	for(var i=0;i<hockeyArr.length;i++){
        		placeMarker(hockeyArr[i]);
        	}
           });
           $('#swimming').click(function(){
        	deleteOverlays();
        	for(var i=0;i<swimArr.length;i++){
        		placeMarker(swimArr[i]);
        	}
           });
           $('#golf').click(function(){
        	deleteOverlays();
        	for(var i=0;i<golfArr.length;i++){
        		placeMarker(golfArr[i]);
        	}
           });
           $('#others').click(function(){
        	deleteOverlays();
        	for(var i=0;i<othersArr.length;i++){
        		placeMarker(othersArr[i]);
        	}
           });
           
       })
        
	
    </script>
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
      }
      table td{
        border-top: 0px;
      }
      #sports-list{
        list-style-type: none;
        font-size: 15px; 
        text-align: center;       
      }
      #sports-list li{
        line-height: 20px;
      }
      .sport-btn{
        width: 100px;
        margin-bottom: 10px;
      }
      .ui-autocomplete-loading { background: white url('images/ui-anim_basic_16x16.gif') right center no-repeat; }
      .ui-widget-content {
		border: 1px solid #DDD;
		background: #EEE;
		color: #333;
		border-radius:5px;
		width:300px;
		padding-left:10px;
		margin-left:0px;
		list-style-type:none;
		cursor:pointer;
	}
    </style>
</head>
<body onload="initMap()">
    <div class="topbar">
      <div class="fill">
        <div class="container">
          <a class="brand" href="index.php">Galli Grounds</a>
          <ul class="nav">
            <li><a href="index.php">Home</a></li>
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
    <div class="container">
    	<h1>Welcome <?php echo $_SESSION['SESS_FIRST_NAME'];?></h1>
    	<a class="btn primary pull-right add-grnd" href="member-profile.php">Add Ground</a>
    	<p>You can see the list of grounds here according to your location selection</p>
        <p>Type in a City name to narrow your search: <input type="text" id="city"></p>
        <table>
            <tr>
                <td style="width:80%;">
                    <div style="float:left;height:600px;width:100%" id="map_canvas"></div>
                </td>
                <td>
                    <div>
                        <ul id="sports-list">
                            <li class="sport-btn btn" id="cricket">Cricket</li>
                            <li class="sport-btn btn" id="football">Football</li>
                            <li class="sport-btn btn" id="basketball">Basket Ball</li>
                            <li class="sport-btn btn" id="volleyball">Volley Ball</li>
                            <li class="sport-btn btn" id="badminton">Badminton</li>
                            <li class="sport-btn btn" id="running">Running</li>
                            <li class="sport-btn btn" id="kabaddi">Kabaddi</li>
                            <li class="sport-btn btn" id="khokho">Kho Kho</li>
                            <li class="sport-btn btn" id="hockey">Hockey</li>
                            <li class="sport-btn btn" id="tennis">Tennis</li>
                            <li class="sport-btn btn" id="baseball">Baseball</li>
                            <li class="sport-btn btn" id="swimming">Swimming</li>
                            <li class="sport-btn btn" id="golf">Golf</li>
                            <li class="sport-btn btn" id="others">Others</li>
                        </ul>
                    </div>
                </td>
            </tr>
        </table>    	
    </div>
    <footer>
        <p>&copy; Galligrounds 2012</p>
    </footer>

</body>
</html>