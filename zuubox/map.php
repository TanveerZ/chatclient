<?php
require_once("include/config.php");
require_once("include/functions.php");

    $query = "
        select place.lat, place.lng, event.color, place.place_name, user_event.content
        from tbl_event_category_master as user_event 
        LEFT JOIN tbl_places as place on user_event.city_id = place.id 
        LEFT JOIN tbl_event_category as event on user_event.event_category_id = event.id 
        where  user_event.user_id = '".$_SESSION['user_id']."'
    ";
    // $query="select * from tbl_places";

    $result = mysqli_query($con, $query);

    $iNumRows = mysqli_num_rows($result);

    $markerData = array();

    if ($iNumRows > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            $markerData[] = $data;
        }
    } else {
        $_SESSION['sessionMsg'] = "No Data Found";
    }

   // echo "<pre>"; print_r($markerData); echo "</pre>";
?>

<link rel="stylesheet" href="css/map.css">

<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css">

<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAc0-x85CWwIhB3O9laBR_DIR--uPjCyJY"></script>

<script>
function initMap() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                    
    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
    map.setTilt(100);
    
    // Multiple markers location, latitude, and longitude
    var markers = [
        <?php if(count($markerData) > 0){ 
            foreach($markerData as $marker){ 
                echo '["'.$marker['place_name'].'", '.$marker['lat'].', '.$marker['lng'].', "'.$marker['color'].'"],'; 
            } 
        } 
        ?>
    ];
                        
    // Info window content
    var infoWindowContent = [
        <?php if(count($markerData) > 0){ 
            foreach($markerData as $marker){ ?>
                ['<div class="info_content">' +
                '<h3><?php echo $marker['place_name']; ?></h3>' +
                '<p><?php echo $marker['content']; ?></p>' + '</div>'],
        <?php } 
        } 
        ?>
    ];
        
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;

    // Place each marker on the map  
    for( i = 0; i < markers.length; i++ ) {
        let url = "http://maps.google.com/mapfiles/ms/icons/";
        url += markers[i][3] + "-dot.png";
        
        //console.log(url);

        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            icon: url,
            // icon:"http://maps.google.com/mapfiles/ms/icons/yellow-dot.png",
            // icon: markers[i][3],
            title: markers[i][0]
        });
        
        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);

    }
    // map.setCenter(new google.maps.LatLng(25.761700, -80.191788));   
    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(11);
        this.setCenter({lat:25.761700,lng:-80.191788});
        google.maps.event.removeListener(boundsListener);
    });
}

// Load initialize function
google.maps.event.addDomListener(window, 'load', initMap);
//map.setCenter(marker.getPosition());

</script>
<div class="calendar_map">

      <div class="window-btn window-btn2">
        <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window"></button>
        <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></button>
        <button type="button" class="fa fa-window-maximize" aria-hidden="true"></button>
        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window"></button>
    </div>

	 
     <div style="height:100%; width:100%;">
        <div id="mapCanvas"> 

     <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d162610.17124434028!2d-80.30909536182102!3d25.763590428404584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9b0a20ec8c111%3A0xff96f271ddad4f65!2sMiami%2C+FL%2C+USA!5e0!3m2!1sen!2sin!4v1520427639617" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->

        </div>  
    </div>
</div>

<style type="text/css">
    html, body, #map-wrapper, #mapCanvas {
    margin: 0;
    padding: 0;
    height: 100%;
    width: 100%;
}
</style>



