<?php
header('Content-Type:text/html; charset=UTF-8');

//  note, this page only echoes the result to screen
//  code by Lex Berman

// retrieve the incoming variables from lat_long_finder.html
 $lat=$_POST["lat"];
 $lng=$_POST["lng"];
 $label=$_POST["label"];

echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"
   \"http://www.w3.org/TR/html4/loose.dtd\">
<html><head>
<title>XY From Google Map</title>
<META http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
<link rel='stylesheet' type='text/css'  href='coder.css'>
<body>
<div id=\"wrap\">
<div id=\"item_note_box\">";


// if the script fails to send the x, y bump to error
if ($lat == "" OR $lng == "")

{
echo"
<b>required coordinate values are missing! 
</b> please back up and try again...
<p>";
if ($lat == "") { echo "<i>Latitude value</i> is blank<br>";}
if ($long == "") { echo "<i>Longitude value</i> is blank<br>";}

print ("</div alt=item_note_box>");
print ("</div></body></html>");
}

//  if the x, y arrive echo them to screen
else {
$timestamp = date(YmdHis);
echo "x = $lng <br> y = $lat <br> $label";
echo "<p>copy and paste LAT,LONG =  $lat,$lng";
echo "<p> submitted at $timestamp";
echo "<p> <a href=\"index.php\">submit another location</a>";
print ("</div alt=item_note_box>");
print ("</div></body></html>");
}

?>



