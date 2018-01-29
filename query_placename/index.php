<?php
header('Content-Type:text/html; charset=UTF-8');

/* Google Maps V3 API version of obtaining  x, y  coordinates as variables
This version starts by submitting a placename, geocoding it, then zooming the map to the found location.   The marker stays at center of map, no matter how you zoom or pan
The position as x, y is updated as the map is moved, and is ready to submit in the form
Code:  Lex Berman 
*/

print ("
<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"
   \"http://www.w3.org/TR/html4/loose.dtd\">
<html><head>
<title>Submit Placename</title>
<META http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
<link rel='stylesheet' type='text/css'  href='css/coder.css'>
</head>
<body>
<div id=\"wrap\">
<h3>X, Y Location to MySQL Form</h3>
");

print ("<p><div id=\"item_map_box\"> Enter a Placename to Start With:<br>
            <form action='map.php' method='post' target='_self'>
            <input type=text class=map size=40 maxlength=40 name='qry_name'></input><br>
            <input type=submit value='SUBMIT'>
 </div>
 "); 


 print ("
 
<p><p>See also Klokan Tech for <a href=\"https://boundingbox.klokantech.com/\" target=\"_new\">bounding boxes</a>

 </div></body></html>");
?>
