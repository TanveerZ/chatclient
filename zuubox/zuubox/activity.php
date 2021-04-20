<?php  
if (session_id() == ''){
	session_start();
}
if(isset($_SESSION['user_id']) && isset($_SESSION['activity_id']))
{

?>

<?php
require_once("include/config.php");
require_once("include/functions.php");

$user = new User();
$cities = $user->select_allrecords('tbl_places','*');

if ($_SERVER['HTTP_HOST'] == "localhost") {

	$SERVER = 'localhost';
	$USERNAME = 'root';
	$PASSWORD = '';
	$DATABASE = 'codesevenstudio';
} else {
	$SERVER = 'localhost';
	$USERNAME = 'zuuboxco_eli';
	$PASSWORD = 'Qawsed@123';
	$DATABASE = 'zuuboxco_DB';
}

    $con = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE) or die('Oops connection error -> ' . mysqli_error($con));
try{

	$recentsQry = "SELECT tbl_event_category_master.date, tbl_places.place_name FROM tbl_event_category_master
	LEFT JOIN tbl_places ON tbl_event_category_master.city_id = tbl_places.id
	WHERE tbl_event_category_master.event_category_id = '".$_SESSION['activity_id']."'
	AND tbl_event_category_master.user_id = '".$_SESSION['user_id']."'
	ORDER BY tbl_event_category_master.add_date DESC, tbl_event_category_master.id DESC LIMIT 5 ";

	$recentActivities = array();
	$result = mysqli_query($con, $recentsQry);
	$iNumRows = mysqli_num_rows($result);
	if ($iNumRows > 0) {
		while ($data = mysqli_fetch_assoc($result)) {
			$recentActivities[] = $data;
		}
	}

	$recentQry = "SELECT tbl_event_category_master.*, tbl_places.place_name FROM tbl_event_category_master
	LEFT JOIN tbl_places ON tbl_event_category_master.city_id = tbl_places.id
	WHERE tbl_event_category_master.event_category_id = '".$_SESSION['activity_id']."'
	AND tbl_event_category_master.user_id = '".$_SESSION['user_id']."'
	ORDER BY tbl_event_category_master.add_date DESC, tbl_event_category_master.id DESC LIMIT 1 ";

	$recentActivity = array();
	$result = mysqli_query($con, $recentQry);
	$iNumRows = mysqli_num_rows($result);
	if ($iNumRows > 0) {
		while ($data = mysqli_fetch_assoc($result)) {
			$recentActivity = $data;
		}
	}

	$markerquery = "
        select place.lat, place.lng, event.color, place.place_name, user_event.content
        from tbl_event_category_master as user_event 
        LEFT JOIN tbl_places as place on user_event.city_id = place.id 
        LEFT JOIN tbl_event_category as event on user_event.event_category_id = event.id 
        where  user_event.user_id = '".$_SESSION['user_id']."' AND user_event.event_category_id = '".$_SESSION['activity_id']."'
    ";

    $result = mysqli_query($con, $markerquery);

    $iNumRows = mysqli_num_rows($result);

    $markerData = array();

    if ($iNumRows > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            $markerData[] = $data;
        }
        //echo "<pre>";print_r($markerData);die;
    }

} catch (Exception $e) {
	echo "Error" . $e->getMessage();
}

?>

<link rel="stylesheet" href="css/activity.css">
<style>
	.activity-hr{ border-top: 0px!important; }
</style>
<form class="activity activity1" method="post" enctype="multipart/form-data" style="background: black !important;">
	<div style="float:left; width:100%;">
    	<img src="img/profile_head.png" class="img-responsive profile-head headerimg" style="width: 88%; flat:left; height:125px!important;">
	</div style="float:right; width:20%;">

	<h3 class="activity-main-title">Activity</h3>
	<div class="window-btn window-btn2" style="position: absolute;
    top: 0;
    right: 5px;
    background: #fff;">
	    <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-activity-t"></button>
	       <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-activity-t" ></button>
	        <button type="button" class="fa fa-window-maximize" aria-hidden="true" id="restore-activity-maximize-t" style="display: none"></button>
	        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-activity-t"></button>
	</div>
	<div class="container" style="width: inherit;">
		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-green session-store <?php echo($_SESSION['activity_id']==1)?'sess-green':'' ?>" id="1">People</button>
				<button class="btn btn-blue session-store <?php echo($_SESSION['activity_id']==3)?'sess-blue':'' ?>" id="3">Places</button>
				<button class="btn btn-red session-store <?php echo($_SESSION['activity_id']==2)?'sess-red':'' ?>" id="2">Things</button>
				<button class="btn btn-yellow session-store <?php echo($_SESSION['activity_id']==4)?'sess-yellow':'' ?>" id="4">Activities</button> <br>
				<hr class="activity-hr">
			</div>
			<div class="col-md-7">
				<div class="activity-card">
					<!-- <button type="button" class="close" data-dismiss="activity-card" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button> -->
					<form role="form" method="POST" enctype="multipart/form-data" name="add-form" id="add-form" >
		                <div class="form-group">
		                    <label for="message-text" class="col-form-label" >Place</label>
		                    <select class="form-control" name="city" id='city_id'>
		                        <?php foreach($cities as $city) {?>
		                        <option value="<?php echo $city['id'] ?>"><?php echo $city['place_name'] ?></option>
		                    <?php } ?>
		                   </select>
		                </div>
		                
		                <div class="form-group">
		                    <label for="recipient-name" class="col-form-label">Date Time</label>
		                    <input type="text" class="form-control " name="datetime" id="datetime1" placeholder="YYYY-MM-DD HH:mm:ss">
		                </div>
		                 
		                <div class="form-group">
		                    <label class="col-form-label">Description</label>
		                    <textarea class="form-control" name="eventDisc" id="eventDisc"></textarea>
		                </div>
		                <!-- <input type="hidden" name="event_id" id="event_id"> -->
		                <button type="button" class="btn btn-primary save_eventt" id="save_event">Save event</button>  

		            </form>
				</div>
			</div>
			<div class="col-md-5">
				<div class="row">
					<div class="col-md-12" style="margin-bottom:5px">
						<!-- <div style="height:100%; width:100%;"> -->
					        <div id="mapActivity">

					        </div>  
					    <!-- </div> -->
					</div>
					
					
				</div>
			</div>
			
			<div class="col-md-7" style="margin-top: 10px;">
				<div class="panel panel-default">
			      	<div class="panel-heading">Recent Activity</div>
			      	<div class="panel-body">
			      		<div class="row">
			      			<?php if(isset($recentActivity)){ ?>
			      				<div class="col-xs-4">
			      					<label><?php echo $recentActivity['place_name'];?> </label>
			      				</div>
			      				<div class="col-xs-4">
			      					<label><?php echo date(" F, d Y ", strtotime($recentActivity['date'])); ?>  <?php echo $recentActivity['time'];?> </label>
			      				</div>
			      				<div class="col-xs-12">
			      					<?php echo $recentActivity['content'];?> 
			      				</div>
		                    <?php } else{ ?>
		                    	<div class="col-xs-12">No Activity added yet!!</div>
		                    <?php } ?>
			      		</div>
			      	</div>
			    </div>
			</div>
			<div class="col-md-5" >
						<ul class="list-group">
							<?php foreach($recentActivities as $recent){ ?>
						  		<li class="list-group-item list-group-item-light">
						  			<b><?php echo $recent['place_name']; ?></b>
						  			<br><?php echo $recent['date'] ;?>
						  		</li>
							<?php } ?>
						</ul>
					</div>
		
		</div>
	</div>
</form>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script type="text/javascript">
   $(document).ready(function(){

   		$(document).on("click", ".session-store", function(){ 
    		var activity_id = $(this).attr('id');
    		// console.log(activity_id);
    		$.post('activity_id.php', {activity_id:activity_id}, function() 
    		{
    			// alert("success"+activity_id);
         	});
         	// location.reload();
    		$.ajax({
		        type:"POST",
		        dataType: 'html',
		        url:"activity.php",     
		        success:function(result){
		            $('.activity').html(result); 
		            $('.activity').css('display','block');
		            $("#datetime1").datetimepicker({format: 'Y-MM-DD HH:mm:ss'});
		            // initActivityMap();

		            $.ajax({
                        type:"GET",
                        dataType: 'JSON',
                        url:"activityMap_ajax.php",     
                        success:function(data){
                            
                                var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                 
    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("mapActivity"), mapOptions);
    map.setTilt(100);


    var markers = data;

    var infoWindowContent = data;
    // Multiple markers location, latitude, and longitude
        
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;

    // Place each marker on the map  
    for( var i = 0; i < markers.length; i++ ) {
        let url = "http://maps.google.com/mapfiles/ms/icons/";
        url += markers[i]['color'] + "-dot.png";
        var position = new google.maps.LatLng(markers[i]['lat'], markers[i]['lng']);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            icon: url,
            title: markers[i]['place_name']
        });
        
        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i]['content']);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);

    }

    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(3);
        google.maps.event.removeListener(boundsListener);
    });


                        }
                    });

		        }
		    });
		    return false;
		});

   		$(document).on("click", "#save_event", function(){ 
		    var eventDisc = "";  
		    eventDisc = $.trim($("#eventDisc").val()); 
		    var city_id = "";
		    city_id = $("#city_id").val();
		    var datetime = "";
		    datetime = $("#datetime1").val();

		    if(eventDisc == '' || city_id =='' || datetime =='' || eventDisc == undefined )
		    {
		      alert('Please fill all fileds on add event');
		    }
		    else
		    {
		        $.ajax({
		            type:"POST",
		            url:"adduserevent.php",
		            data:{city_id:city_id,datetime:datetime,eventDisc:eventDisc},
		            success:function(result){ 
		                alert('You have successfully add event.');  
		                $('#eventDisc').val(''); 
		                $('#datetime1').val(''); 

		                $.ajax({
					        type:"POST",
					        dataType: 'html',
					        url:"activity.php",     
					        success:function(result){
					            $('.activity').html(result); 
					            $('.activity').css('display','block');
					            $("#datetime1").datetimepicker({format: 'Y-MM-DD HH:mm:ss'});
					            // initActivityMap();

					            $.ajax({
                        type:"GET",
                        dataType: 'JSON',
                        url:"activityMap_ajax.php",     
                        success:function(data){
                            
                                var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                 
    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("mapActivity"), mapOptions);
    map.setTilt(100);


    var markers = data;

    var infoWindowContent = data;
    // Multiple markers location, latitude, and longitude
        
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;

    // Place each marker on the map  
    for( var i = 0; i < markers.length; i++ ) {
        let url = "http://maps.google.com/mapfiles/ms/icons/";
        url += markers[i]['color'] + "-dot.png";
        var position = new google.maps.LatLng(markers[i]['lat'], markers[i]['lng']);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            icon: url,
            title: markers[i]['place_name']
        });
        
        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i]['content']);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);

    }

    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(3);
        google.maps.event.removeListener(boundsListener);
    });


                        }
                    });
					        }
					    });
		                // location.reload();
		            }
		        });  
		    }
		});

		$(document).on("click", "#close-activity-t", function(){
			$('.activity').hide();
			//$('.activity1').hide();
			$('.activity').css('display', 'none');

		});	

		$(document).on("click", "#minimize-activity-t", function(){
			$('.activity').hide();
			$('.activity').css('display', 'none');
		});

		$(document).on("click", "#restore-activity-t", function(){
			$('#restore-activity-maximize-t').show();
			$('#restore-activity-t').hide();
		});

		$(document).on("click", "#restore-activity-maximize-t", function(){
			$('#restore-activity-t').show();
			$('#restore-activity-maximize-t').hide();
		});

    });


function initActivityMap() {
	console.log("init map");
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                 
    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("mapActivity"), mapOptions);
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
                '<p><?php echo $marker['content']; ?></p>' + '</div>'],
        <?php } 
        } 
        ?>
    ];
        
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;

    // Place each marker on the map  
    for( var i = 0; i < markers.length; i++ ) {
        let url = "http://maps.google.com/mapfiles/ms/icons/";
        url += markers[i][3] + "-dot.png";
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            icon: url,
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

    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(3);
        google.maps.event.removeListener(boundsListener);
    });

}

// Load initialize function
// google.maps.event.addDomListener(window, 'load', initActivityMap);

// var myButton = document.getElementsByClassName('addevent');
// console.log(myButton+" button");
// google.maps.event.addDomListener(myButton, 'click', initActivityMap);
</script>

<?php } ?>