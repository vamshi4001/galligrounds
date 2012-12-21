<?php
mysql_connect("localhost","root","100Likes!");//database connection
mysql_select_db("bragem");
$query = "SELECT latitude,longitude,sport,area,place,state,country FROM playgrounds";
    $result = mysql_query($query);  
    

    /* create one master array of the records */
    $posts = array();
    if (mysql_num_rows($result)) {
      while ($post = mysql_fetch_assoc($result)) {
        $posts[] = array('ground' => $post);
      }
    }

    /* output in necessary format */
      header('Content-type: application/json');
      echo json_encode(array('grounds' => $posts));
?>
