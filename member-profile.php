<?php
	require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Galli Grounds - Add Ground</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
 	<style type="text/css">
        #map_canvas {height:400px;width:600px}
        .red{color:red;}
        .errormsg{color:red;}
        .styled-select select {
           background: transparent;
           width: 190px;
           padding:0px;
           font-size: 13px;
           border: 1px solid #ccc;
           height: 24px;
        }
        .styled-select {
           width: 160px;
           height: 24px;
           overflow: hidden;
           border-radius: 5px;
           background: url(images/down.png) no-repeat right #FFF;
        }
    </style>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script type="text/javascript">
        var map;
        var markersArray = [];

        function initMap()
        {
            if (navigator.geolocation) {
                // Use method getCurrentPosition to get coordinates
                navigator.geolocation.getCurrentPosition(function (position) {
                    // Access them accordingly
                    //alert(position.coords.latitude + ", " + position.coords.longitude);
                    var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                    var myOptions = {
                        zoom: 17,
                        center: latlng,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

                    // add a click event handler to the map object
                    google.maps.event.addListener(map, "click", function(event)
                    {
                        // place a marker
                        placeMarker(event.latLng);

                        // display the lat/lng in your form's lat/lng fields
                        document.getElementById("latFld").value = event.latLng.lat().toFixed(6);
                        document.getElementById("lngFld").value = event.latLng.lng().toFixed(6);
                        $('#status').attr({src:'images/yes.png',style:'vertical-align:middle'});
                        $('#select').text("Location Selected");
                    })
                },
                function(err){
                    var latlng = new google.maps.LatLng(17.85329,77.864502);
                    var myOptions = {
                        zoom: 5,
                        center: latlng,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                    google.maps.event.addListener(map, "click", function(event)
                    {
                        // place a marker
                        placeMarker(event.latLng);

                        // display the lat/lng in your form's lat/lng fields
                        document.getElementById("latFld").value = event.latLng.lat().toFixed(6);
                        document.getElementById("lngFld").value = event.latLng.lng().toFixed(6);
                        $('#status').attr({src:'images/yes.png',style:'vertical-align:middle'});
                        $('#select').text("Location Selected");
                    });
                });
            }
        }
        function placeMarker(location) {
            // first remove all markers if there are any
            deleteOverlays();

            var marker = new google.maps.Marker({
                position: location, 
                map: map
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
    </script>
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
      }
      table td{
        border-top: 0px;
      }
      table#textitems{
        width:330px;
      }
    </style>
</head>

<script type="text/javascript">
$(document).ready(function()
{
    $("#submit").click(function(){
        var lat = $('#latFld').val();
        var lng = $('#lngFld').val();
        var sport = $('#sport').val();
        var area = $('#area').val();
        var placeUrl = "http://api.geonames.org/findNearbyPlaceNameJSON?lat="+lat+"&lng="+lng+"&username=vamshi4001";
        var country = "";
        var place = "";
        var state = "";
        var dataString = "";
        $.ajax({
                    type: "GET",
                    url: placeUrl,
                    //cache: false,
                    success: function(data){
                        console.log(data);
                       country = data.geonames[0].countryName;
                       place = data.geonames[0].toponymName;
                       state =  data.geonames[0].adminName1;
                       dataString =     "latitude="+lat+
                                            "&longitude="+lng+
                                            "&sport="+$("#sport-select option:selected").text()+
                                            "&area="+area+
                                            "&country="+country+
                                            "&place="+place+
                                            "&state="+state;
                        console.log(dataString);
                        $.ajax({
                                    type: "POST",
                                    url: "enter.php",
                                    data: dataString,
                                    cache: false,
                                    success: function(html){
                                        $("#message").html(html);
                                    }
                        }); 
                    }
        });
    });
});
</script>
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
          <form class="pull-right">
            <a class="btn primary" href="logout.php">Logout</a>  
          </form>
        </div>
      </div>
    </div>
    <div class="container">
        <h1>Add a ground in your galli!! </h1>        
        <a class="btn primary pull-right" href="member-index.php">View Grounds</a>
        <p>The last selected location will be considered even though you try to select multiple points</p>
        <table>
            <tr>
                <td>
                    <div style="float:left" id="map_canvas"></div>
                </td>
            <td>
                <form method="post" style="">
                    <div id="message"></div>
                    <table id="textitems">
                        <tr>
                            <td>Location</td>
                            <td><span id="select">Not Selected: </span><img id="status" src="images/no.png" height="32px" width="32px" style="vertical-align:middle"/></td>
                        </tr>
                        <tr><td colspan="2"><b>Click on location only after zooming in closely</b></td></tr>
                        <tr >
                            <td></td>
                            <td><input type="hidden" name="latitude" id="latFld"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="hidden" name="longitude" id="lngFld"></td>
                        </tr>
                        <tr>
                            <td>What Can you Play?</td>
                            <td><div class="styled-select" style="float:left;">
                                        <select id="sport-select">
                                            <option value="select">Select Sport</option>
                                            <option value="cricket">Cricket</option>
                                            <option value="football">Football</option>
                                            <option value="basketball">Basket Ball</option>
                                            <option value="volleyball">Volley Ball</option>
                                            <option value="badminton">Badminton</option>
                                            <option value="running">Running</option>
                                            <option value="kabaddi">Kabaddi</option>
                                            <option value="khokho">Kho Kho</option>
                                            <option value="hockey">Hockey</option>
                                            <option value="tennis">Tennis</option>
                                            <option value="baseball">Baseball</option>
                                            <option value="swimming">Swimming</option>
                                            <option value="hockey">Hockey</option>
                                            <option value="golf">Golf</option>
                                            <option value="others">Others</option>
                                        </select>
                            </div></td>
                        </tr>
                        <!-- <tr>
                            <td>What is it called locally?</td>
                            <td><input type="text" name="localname" id="localname"></td>
                        </tr>
                        <tr>
                            <td>Landmark</td>
                            <td><input type="text" name="landmark" id="landmark"></td>
                        </tr> -->
                        <tr>
                            <td>Area/Locality Name</td>
                            <td><input style="width:150px;" type="text" name="area" id="area"></td>
                        </tr>
                        <tr colspan="2">
                            <td><center><input class="btn primary" type="button" id="submit" value="Add Ground"/></center></td>
                        </tr>
                    </table>
                </form>
            </td>
        </table>
    </div>
    <footer>
        <p>&copy; Galligrounds 2012</p>
    </footer>
</body>
</html>