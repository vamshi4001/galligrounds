<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        #map_canvas {height:600px;width:800px}
        .red{color:red;}
        .errormsg{color:red;}
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
                        $('#status').attr('src','images/yes.png');
                        $('#select').text("Location Selected");
                    });
                    // Check for geolocation support
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
                    data: dataString,
                    //cache: false,
                    success: function(data){
                        console.log(data);
                       country = data.geonames[0].countryName;
                       place = data.geonames[0].toponymName;
                       state =  data.geonames[0].adminName1;
                       dataString =     "latitude="+lat+
                                            "&longitude="+lng+
                                            "&sport="+sport+
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
                                        $("#message").append(html);
                                    }
                        }); 
                    }
        });
    });
});
</script>
<body onload="initMap()">
    <div style="float:left" id="map_canvas"></div>
    <form method="post">
        <div id="message"></div>
        <table>
            <tr>
                <td>Location</td>
                <td><span id="select">Not Selected: </span><img id="status" src="images/no.png" height="32px" width="32px" style="vertical-align:middle"/></td>
            </tr>
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
                <td><input type="text" name="sport" id="sport"><span class="red">*</span></td>
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
                <td><input type="text" name="area" id="area"></td>
            </tr>
            <tr colspan="2">
                <td><center><input type="button" id="submit" value="Add Ground"/></center></td>
            </tr>
        </table>
    </form>
    <div class="message"></div>
</body>
</html>