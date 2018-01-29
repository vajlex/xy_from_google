<?php 
header('Content-Type:text/html; charset=UTF-8');

// revised for Google API V3 and new API Key
// version:  2018-01
// author:  Lex Berman

$qry_name = $_POST["qry_name"];
$adr = urlencode("$qry_name");
// geocoding request
$url="http://maps.googleapis.com/maps/api/geocode/json?address=$adr&types=locality&sensor=false";
// parsing the json return
$jsonData   = file_get_contents($url);
$val = json_decode($jsonData);
$val_long_nm = $val->results[0]->address_components[0]->long_name;
$val_lat = $val->results[0]->geometry->location->lat;
$val_lng = $val->results[0]->geometry->location->lng;

?>

 <!DOCTYPE html>
<html>
  <head>
    <title>XY From Google Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
  <link rel='stylesheet' type='text/css'  href='coder.css'>  
  </head>
  <body>
<div id="wrap">
  <div id="item_note_box"> Your query: <?php echo $qry_name; ?>
  <p /> <span class="update">Zoom and pan to reset X, Y values to your exact location, then SUBMIT</span>
  </div>
   <div id="item_note_box">
    <div id="gmap"></div>
      lat:<span id="lat"></span> lon:<span id="lon"></span><br/>
    <p> 
      <form action="submit_xy.php" method="post" name="LatLngForm">
          Latitude: <input class="map" name="lat" readonly / value=" <?php echo $val_lat; ?> ">
        Longitude: <input class="map" name="lng" readonly value=" <?php echo $val_lng; ?> "/>
      <br>Add a Label Name:  <input class="map" type=text name=label size=40 value="<?php echo $val_long_nm; ?>">
      <br><input type=submit value="SUBMIT">
      </form> 
</div alt=item_note_box>

</div>    
    <script>
    var map;
    var marker=false;
      function initMap() {
        // set myLatLng with incoming values

        <?php
          echo "
          var myLatLng = new google.maps.LatLng(".$val_lat.",".$val_lng."); 
          ";
        ?>

        var myOptions = {
          zoom: 12,
          center: myLatLng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        map = new google.maps.Map(document.getElementById('gmap'), myOptions);

// put in your current position marker

        marker = new google.maps.Marker({
          position: myLatLng, 
          map: map       
          });

// make sure the marker is at the center
        google.maps.event.addListener(map, 'center_changed', function() {
          var location = map.getCenter();
        document.getElementById("lat").innerHTML = location.lat();
        document.getElementById("lon").innerHTML = location.lng();
  
// create a dom object for your values!  this part took the most time to figure out!        
        document.LatLngForm.lat.value = document.getElementById("lat").innerHTML;  
        document.LatLngForm.lng.value = document.getElementById("lon").innerHTML;  
 
          placeMarker(location);
        });

// some listeners to change the zoom, double clicking will zoom
        google.maps.event.addListener(map, 'zoom_changed', function() {
          zoomLevel = map.getZoom();
        document.getElementById("zoom_level").innerHTML = zoomLevel;
        });
        google.maps.event.addListener(marker, 'dblclick', function() {
          zoomLevel = map.getZoom()+1;
          if (zoomLevel == 20) {
           zoomLevel = 10;
          }    

          document.getElementById("zoom_level").innerHTML = zoomLevel; 

        map.setZoom(zoomLevel);  

        });
   
   // set the zoom level lat and lng elements to start     
        document.getElementById("lat").innerHTML = <?php echo $val_lat; ?> ;
        document.getElementById("lon").innerHTML = <?php echo $val_lng; ?> ;

      }

      // reset the location 
      function placeMarker(location) {
        var clickedLocation = new google.maps.LatLng(location);
        marker.setPosition(location);
      }

    window.onload = function(){initMap();};

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZbzSHISk1OVns0oJaqzkTBJbP1JH3sog&callback=initMap"
    async defer></script>
  </body>
</html>