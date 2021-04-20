<?php 

if (session_id() == ''){
	session_start();
}
$markersData = array();
if(isset($_SESSION['user_id']) && isset($_SESSION['activity_id']))
{

?>

<?php

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

	$markerquery = "
        select place.lat, place.lng, event.color, place.place_name, user_event.content
        from tbl_event_category_master as user_event 
        LEFT JOIN tbl_places as place on user_event.city_id = place.id 
        LEFT JOIN tbl_event_category as event on user_event.event_category_id = event.id 
        where  user_event.user_id = '".$_SESSION['user_id']."' AND user_event.event_category_id = '".$_SESSION['activity_id']."'
    ";

    $result = mysqli_query($con, $markerquery);

    $iNumRows = mysqli_num_rows($result);

    $markersData = array();


    if ($iNumRows > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            $markersData[] = $data;
        }

        
    }

} catch (Exception $e) {
	//echo "Error" . $e->getMessage();
}
}

echo json_encode($markersData);
exit();

?>