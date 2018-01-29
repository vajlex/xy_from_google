<?php
header('Content-Type:text/html; charset=UTF-8');

//  note, this page only echoes the result
//  see submit_xy_INSERT if you want the actual database php insert code
//  code by Lex Berman



// retrieve the incoming variables from lat_long_finder.html
 $lat=$_POST["lat"];
 $lng=$_POST["lng"];
 $label=$_POST["label"];

// if the script fails to send the x, y bump to error
if ($lat == "" OR $lng == "")

{
echo"
<b>required coordinate values are missing! </b> please back up and try again...
<p>";
if ($lat == "") { echo "<i>Latitude value</i> is blank<br>";}
if ($long == "") { echo "<i>Longitude value</i> is blank<br>";}
}

//  if the x, y arrive echo them to screen
else {

$timestamp = date(YmdHis);

echo "x = $lng <br> y = $lat <br> $label <p> submitted at $timestamp";

echo "<p> <a href=\"index.html\">submit another location</a>";

}

?>



