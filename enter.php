<?php
//the example of inserting data with variable from HTML form
//input.php
mysql_connect("localhost","USERNAME","PASSWORD");//database connection
mysql_select_db("bragem");

$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$sport = $_POST['sport'];
// $landmark = $_POST['landmark'];
// $localname = $_POST['localname'];
$area = $_POST['area'];
$place = $_POST['place'];
$state = $_POST['state'];
$country = $_POST['country'];

if((string)$latitude!=""&&(string)$longitude!=""&&$sport!=""){
  //inserting data order
  $query = "INSERT INTO playgrounds (latitude,longitude,sport,area,place,state,country) VALUES ('$latitude','$longitude','$sport','$area','$place','$state','$country')";
  //declare in the order variable
  $result = mysql_query($query);  
  if($result){
    ?>
    <div style="color:green"><center>Galli Ground Updated Successfully</center></div>
    <?php
  } else{
    ?>
    <div style="color:red"><center><br>Something has gone wrong! Contact Admmin - admin@galliground.com</center></div>
    <?php
  }
}
else{
  ?>
   <span class='errormsg'>Please select a location on map! Also sport that can be played should be entered.</span>
   <?php
}
?>
